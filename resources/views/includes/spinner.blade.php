<div id="spinner-wrapper" class="spinner-wrapper" style="display: none;">
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

<style>
    .spinner-wrapper {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
        z-index: 1000;
        background-color: rgba(255, 255, 255, 0.8);
    }
</style>


<script>
    function showSpinner() {
        document.getElementById('spinner-wrapper').style.display = 'flex';
    }

    function hideSpinner() {
        document.getElementById('spinner-wrapper').style.display = 'none';
    }
</script>