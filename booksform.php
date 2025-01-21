<form action="addbook.php" method="POST" enctype="multipart/form-data">
  ISBN:<input type="text" name="isbn"><br>
  Title:<input type="text" name="title"><br>
  Author:<input type="text" name="author"><br>
  Genre:<input type="text" name="genre"><br>
  Description:<input type="text" name="description"><br>
  Cover: <input type="file" id="cover" name="cover" accept="image/*"><br>
  On loan? :<input type="text" name="onloan"><br>
  Shelf Number:<input type="number" name="shelf"><br>
  Fiction:<select name="fictionornot">
		<option value="Y">Yes</option>
		<option value="N">No</option>
	</select>
  <br>
<input type="submit" value="Add Book">
</form>