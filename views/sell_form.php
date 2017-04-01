<!DOCTYPE html>
<html>
<head>
	<title>Sell an Item</title>
</head>
<body>
	<form action="/controllers/sell.php">

		<select>
			<option>Books</option>
			<option>Clothing</option>
			<option>Electronics</option>
			<option>Furniture</option>
			<option>Sports</option>
			<option>Vehicle</option>
			<option>Others</option>

		</select>

		<input type="text" name="item-title">
		<input type="text" name="item-description">
		<input type="text" name="contact">

		<input type="radio" name="I want to Donate">
		<input type="radio" name="I want to sell">

		<input type="text" name="Your Price">

		<input type="file" name="pic" accept="image/*">

		<button type="submit" name="submit"></button>
	</form>
</body>
</html>