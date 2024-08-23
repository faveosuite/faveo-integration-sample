@extends('welcome')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Introduction</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Introduction</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <!-- Introduction Section -->
                <h2 class="text-primary border-bottom pb-2">Introduction to License Manager</h2>
                <p>A License Manager is an essential tool for developers looking to protect and manage their software products effectively. It offers advanced protection features, ensuring that your scripts are secure and versatile, with logical operations for extreme guard. This tool is crucial for those who seek full control over their products, providing peace of mind by safeguarding against unauthorized usage and distribution.</p>
                <p>The License Manager not only secures your software but also streamlines the process of creating and managing licenses, making it an invaluable asset in the software development lifecycle. With its robust features, it enables developers to control product versions, manage installations, and enforce licensing terms seamlessly.</p>

                <hr class="my-4">

                <!-- Why You Need a License Manager Section -->
                <h2 class="text-primary border-bottom pb-2">Why Do You Need a License Manager?</h2>
                <p>In today's digital landscape, where software piracy and unauthorized usage are prevalent, a License Manager is a necessity. It ensures that only authorized users can access and use your software, thereby protecting your intellectual property and revenue. By integrating a License Manager, you can prevent unauthorized distribution, enforce licensing agreements, and ensure compliance with your terms of service.</p>

                <hr class="my-4">

                <!-- Benefits Section -->
                <h2 class="text-primary border-bottom pb-2">Benefits of Using a License Manager</h2>
                <ul class="list-unstyled">
                    <li><strong class="text-primary">Enhanced Security:</strong> Protects your scripts with advanced features and logical operations, offering unparalleled security for your software.</li>
                    <li><strong class="text-primary">Full Control:</strong> Allows you to manage and monitor product versions, installations, and updates, giving you complete control over your software lifecycle.</li>
                    <li><strong class="text-primary">Automated Management:</strong> Automates the process of license creation, distribution, and management, saving you time and effort.</li>
                    <li><strong class="text-primary">Revenue Protection:</strong> Prevents unauthorized usage, ensuring that only paying customers can use your software, thereby protecting your revenue.</li>
                    <li><strong class="text-primary">Versatility:</strong> Offers a range of features such as invisible background updates, customizable notifications, and detailed reports, making it adaptable to various use cases.</li>
                </ul>

                <hr class="my-4">

                <!-- Functionality Section -->
                <h2 class="text-primary border-bottom pb-2">Functionality of the License Manager</h2>
                <p>The License Manager integrates seamlessly into your PHP-based applications, offering a wide range of functionalities:</p>
                <ul class="list-unstyled">
                    <li><strong class="text-primary">Automatic Updates:</strong> Invisibly updates your software and databases in the background, ensuring your users always have the latest version.</li>
                    <li><strong class="text-primary">Version Control:</strong> Manages unlimited products, versions, and files, with options for active version limits and individual expiration dates.</li>
                    <li><strong class="text-primary">Custom Notifications:</strong> Sends notifications in your preferred language, keeping your users informed about updates and changes.</li>
                    <li><strong class="text-primary">Real-time Reporting:</strong> Provides thorough, real-time reports and detailed changelogs, giving you insights into the usage and performance of your software.</li>
                    <li><strong class="text-primary">Complete Automation:</strong> Features a built-in API for full automation, allowing you to automate the licensing process from start to finish.</li>
                </ul>

                <p>Now that you understand what a License Manager is and the extensive benefits it offers, it's time to integrate it into your workflow and experience the security and control it provides.</p>

            </div>
        <!-- /.content -->
    </div>
    </div>
    <!-- /.content-wrapper -->
    <style>
        /* Container styling for the documentation */
        .documentation-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
            color: #333;
        }

        /* Heading styling */
        .documentation-container h2 {
            color: #0056b3;
            font-size: 1.8em;
            border-bottom: 2px solid #0056b3;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        /* Paragraph styling */
        .documentation-container p {
            line-height: 1.6;
            margin-bottom: 20px;
            font-size: 1em;
        }

        /* Horizontal rule styling */
        .documentation-container hr {
            border: 0;
            border-top: 2px solid #0056b3;
            margin: 40px 0;
        }

        /* List styling */
        .documentation-container ul {
            list-style: disc;
            margin-left: 20px;
        }

        .documentation-container li {
            margin-bottom: 10px;
            font-size: 1em;
        }

        /* List item heading styling */
        .documentation-container li strong {
            color: #0056b3;
        }

        /* Ensure responsiveness */
        @media (max-width: 768px) {
            .documentation-container {
                padding: 15px;
            }

            .documentation-container h2 {
                font-size: 1.5em;
            }
        }

    </style>
@endsection
