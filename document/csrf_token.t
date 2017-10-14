// create hidden field csrf_field

{{ csrf_field() }}

// custom csrf

'_token':'{{ csrf_token() }}'

<meta name="csrf-token" content="{{ csrf_token() }}">
$('meta[name="csrf-token"]').attr('content')}