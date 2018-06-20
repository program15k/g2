<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">

        <title>jo jo</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

       
    </head>
    <body>
	<div id="app">
Test
  <example-component></example-component>
  <example-component1>
         <div slot="form-header">
           <h3>This is the title of the form</h3>
           <p>Information about the form</p>
       </div>
       <div slot="form-fields">
           <input type="text" placeholder="Name" required />
           <input type="password" placeholder="Password" required />
       </div>
       <div slot="form-controls">
           <button v-on:click="handleSumbit">Sumbit</button>
       </div>
  </example-component1>
  <example-component2></example-component2>
	</div>
		<script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>

