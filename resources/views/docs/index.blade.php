<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Docs</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<style>
		#docs {
			min-height: 200px;
			transition: all 0.3s;
		}
		#docs:hover {
			box-shadow: 0px 0px 5px 1px gray;
			transition: all 0.3s;
		}
	</style>
	<script>
		let connection = new WebSocket('ws://changyuz-websocket.herokuapp.com');
		$(document).ready(() => {
			let docs = document.getElementById('docs');
			docs.oninput = () => {
				connection.send(docs.innerHTML);
			};
			connection.onmessage = (message) => {
				docs.innerHTML = message.data;
			};
		});
	</script>
</head>
<body>
	<div class="container">
		<h1>405 Docs</h1>
		<div id="docs" class="card p-2" contenteditable="true"></div>
	</div>
</body>
</html>