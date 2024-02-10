<!DOCTYPE html>
<html>
<head>
    <title>{{ __('Lista') }}</title>
    <style>
        body {
            margin: 10mm 15mm;
            padding: 0;
        }
        img {
            max-width: 100%;
            max-height: 100%;
        }
        .new-page {
            page-break-before: always;
        }
    </style>
</head>
<body>
    @foreach ($imagesInfo as $index => $imageInfo)
        @if ($index > 0)
            <div class="new-page">
        @endif
            <img src="{{ storage_path('app/songs/' . $imageInfo['fileName']) }}" alt="">
        @if ($index > 0)
            </div>
        @endif
    @endforeach
</body>
</html>
