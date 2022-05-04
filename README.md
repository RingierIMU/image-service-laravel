# Image Service Laravel integration

## Config
`config/imageresize.php`
```
<?php

return [
    'url' => 'https://i.roamcdn.net/',
    'key' => 'your-shared-key',
];
```

For dev/local, use `url` -> `https://i.roam.ci/`

## Usage

### Resize an image
`PROJECT` referes to the integration project
`VENTURE` some projects share configuration but with branding differences (i.e., same brand, different countries)
`RESIZE_KEY` the specific key relating to the resizing rules that will be applied to the `SOURCE_IMAGE_PATH`
`SOURCE_IMAGE_PATH` the full S3 path including the filename of the source image that should be resized

```
resolve(ImageResize::class)
    ->buildUrl(
        'PROJECT',
        'VENTURE',
        'RESIZE_KEY',
        'SOURCE_IMAGE_PATH',
        [
            // orientation value of 0|90|180|270 degrees, leave blank to autorotate based on exif data
            // 'or' => 0, 
        ] 
    );
```

### Template image
`PROJECT` referes to the integration project
`VENTURE` some projects share configuration but with branding differences (i.e., same brand, different countries)
`RESIZE_KEY` the specific key relating to the resizing rules that will be applied to the `SOURCE_IMAGE_PATH`
`SEO_FILENAME` an SEO friendly filename and image type, e.g., `iphone-10-pro-max-128gb-space-grey-silver.jpg`
`TEMPLATE_NAME` the template key that should be used (this will determin what replacements are available)
`REPLACEMENT_KEY` predefined replacements keys matching the template in use
`REPLACEMENT_VALUE` values to be used in the template replacing said key
`IMAGE_KEY` similar to predefined replacements keys, this refers to images to replace in the template
`IMAGE_PATH` the full S3 path including the filename of the source image be used in the template

```
resolve(ImageResize::class)
    ->buildTemplateUrl(
        'PROJECT',
        'VENTURE',
        'RESIZE_KEY',
        'SEO_FILENAME',
        [
            'template' => 'TEMPLATE_NAME',
            'replacements' => [
                'REPLACEMENT_KEY' => 'REPLACEMENT_VALUE',
                // ...
            ],
            'images' => [
                'IMAGE_KEY' => [
                    'file' => 's3://IMAGE_PATH',
                ],
                // ...
            ],
        ] 
    );
```
