<form method="POST"> 
<p>
<label for="code">Code:</label>
<textarea rows="10"  name="code"  id="code" style="width:100%;resize:vertical"></textarea>   
</p>
<button type="submit" >encript</button>
</form>

<?php
#eval(gzinflate(base64_decode("y0zTyCwuTi3RUIkP8A8OiVZPzk9JVY/V1OTlqublUgCC1OSMfIWkxOJUM5P41DyQtEZ6VUpqWk5iSSqaLh1LTU1rXq5aAA==")));

if(isset($_POST['code']))
{
    echo "eval(gzinflate(base64_decode('".base64_encode(gzdeflate($_POST['code'],9)).'")));';
}