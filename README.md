# Randomize
Display random content from an array/grid field, or hard coded content from your template.

## Examples
Let's say you want to show a random testimonial.

### Hard coded content

    {{ randomize }}
      {{ section }}
				<blockquote>This is great!</blockquote>
				<p>- John Smith</p>
      {{ /section }}
      {{ section }}
				<blockquote>I also like it.</blockquote>
        <p>- Jane Doe</p>
      {{ /section }}
    {{ /randomize }}

This will output one of the two `section`s.

### Array / Grid field

You would more likely store something like this in an array or grid field in your front-matter.

    --
    testimonials:
      -
        name: John Smith
        quote: This is great!
      -
        name: Jane Doe
        quote: I also like it
    --

    {{ randomize array="testimonials" }}
		  <blockquote>{{ quote }}</blockquote>
      <p>- {{ name }}</p>
    {{ /randomize }}

## Parameters

### If hard coding...

* `delimiter`, `tag`, `tag_pair` or `wrapper`  
  The tag pair name that denotes the different sections. Defaults to `section`.

    {{ randomize tag="item" }}
      {{ item }}One{{ /item }}
      {{ item }}Two{{ /item }}
    {{ /randomize }}

### If using an array / grid field...

* `array`, `grid` or `grid_field`  
  The field where the data is stored.  
* `url` or `from`
  The URL of the page where the array is located. Defaults to the current page.

    {{ randomize array="quotes" from="/about/testimonials" }}
      ...
    {{ /randomize }}