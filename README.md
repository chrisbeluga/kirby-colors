# Kirby Color Selection

A simple color selection field for [Kirby CMS](https://getkirby.com),

## Preview

![](https://github.com/chrisbeluga/kirby-colors/blob/master/screenshot.png)

## Output

```json
{
    "title": "Honeydew",
    "hex": "E2EFDE",
    "class": "bg-honeydew-500"
}
```

## Installation & Usage

Copy plugin files to your plugin directory.

## Blueprint Usage

Add the following blueprint to wherever you would like the colors field to appear.

```yaml
color:
  label: Background Color
  type: colors
  width: 1/2
  help: Select a background color for the form
  options:
    honeydew:
      hex: E2EFDE
      title: Grey
      class: bg-honeydew-500
    apricot:
      hex: F4B266
      title: Apricot
      class: bg-apricot-500
    white:
      hex: FFFFFF
      title: White
      class: bg-white
    black:
      hex: 000000
      title: Black
      class: bg-black
```

## Frontend Usage

```php
// Outputs the selected color title as a string
$page->field_name()->colors('title')

// Outputs the selected color hex code as a string (without preceding #)
$page->field_name()->colors('hex')

// Outputs the selected color class as a string
$page->field_name()->colors('class')
```
