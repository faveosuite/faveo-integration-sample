function sendPostRequest(url, data, headers = {}) {
    return new Promise((resolve, reject) => {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        $.ajax({
            url: url,
            type: 'POST',
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            },
            data: JSON.stringify(data),
            success: function(response) {
                resolve(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Attempt to extract error details
                let errorData = {
                    status: jqXHR.status,
                    statusText: jqXHR.statusText,
                    response: jqXHR.responseText
                };

                try {
                    if (jqXHR.responseJSON) {
                        // Use JSON data if available
                        errorData = jqXHR.responseJSON;
                    }
                } catch (e) {
                    // Fallback to plain text error if JSON parsing fails
                    errorData.response = 'An error occurred while processing the error response.';
                }

                // Reject the promise with the error data
                reject(errorData);
            }
        });
    });
}

async function sendGetRequest(url) {
    try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        const response = await fetch(url, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
        });
        if (!response.ok) {
            throw new Error(`${response}`);
        }

        const responseData = await response.json();
        return responseData;
    } catch (error) {
        throw error; // Re-throw the error for further handling if needed
    }
}

function getApiUrl(endpoint) {
    // The URL should be enclosed in quotes so it's treated as a string in JavaScript
    const AppURL = document.querySelector('base').getAttribute('href');
    // Ensure the endpoint starts with a slash
    if (!endpoint.startsWith('/')) {
        endpoint = '/' + endpoint;
    }

    return AppURL + endpoint;
}

function errorHandler(err) {
    // Check if error is a duplicate request rejection
    if (err.duplicateRequestRejection) {
        return;
    }

    // Handle errors for status codes 400, 422, 401, 429, 500
    if ([400, 422, 401, 429, 500].includes(err.response.status)) {
        // Display error message if available
        if (err.response.data.message) {
            console.error('Error:', err.response.data.message);
            // You can handle this message as needed, e.g., display in UI
        }

        // Handle old format errors
        if (err.response.data.result && err.response.data.result.fails) {
            console.error('Error:', err.response.data.result.fails);
            // You can handle this message as needed, e.g., display in UI
        }
    }

    // Handle 412 Precondition Failed
    if (err.response.status === 412) {
        if (err.response.data.message) {
            console.error('Validation Error:', err.response.data.message);
            // You can handle this message as needed, e.g., display in UI
        }
    }

    // Handle 404 Not Found
    if (err.response.status === 404) {
        window.location.href = '/404'; // Redirect to a 404 page
    }
}
function successHandler(res) {
    if (res.status === 200 || res.status === 201) {
        // Display success message if available
        if (res.data.message) {
            console.log('Success:', res.data.message);
            // You can handle this message as needed, e.g., display in UI
        }
    }
}

function isUrlValid(str) {
    const pattern = new RegExp(
        '^(https?:\\/\\/)?' + // protocol
        '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|' + // domain name
        '((\\d{1,3}\\.){3}\\d{1,3}))' + // OR IP (v4) address
        '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*' + // port and path
        '(\\?[;&a-z\\d%_.~+=-]*)?' + // query string
        '(\\#[-a-z\\d_]*)?$', // fragment locator
        'i'
    );
    return pattern.test(str);
}

