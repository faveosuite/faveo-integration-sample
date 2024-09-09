<!-- resources/views/components/tooltip.blade.php -->
<span
    data-toggle="tooltip"
    data-bs-placement="{{ $placement }}"
    data-bs-title="{{ $message }}"
    style="margin-left: 2px; position: relative; top: 0px; color: #337ab7;"
>
    <i class="fas fa-question-circle" style="font-size: {{ $size }}; cursor: help;"></i>
</span>

<!-- jQuery -->
{{--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
