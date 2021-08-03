<!doctype html>
<style>
    /* for merchandise searching   */
.search-merch{
  margin: auto;
  padding: 30px;
  padding-left: 160px;
  position: relative;
  display: block;
}

.search-merch [type=text]{
  padding: 13px;
  padding-top: 15px;
  font-size: 14px;
  border-radius: 20px;
  float: center;
  width: 1000px;
  height: 50px;
  background: white;
}

.search-merch button{
  float: center;
  width: 8%;
  padding: 13px;
  padding-top: 30px;
  position: absolute;
  background: #3aafa9;
  color: white;
  font-size: 15px;
  border: 1px white;
  border-radius: 30px;
  border-left: none;
  cursor: pointer;
}

.search-merch button:hover{
  background: #2b7a78;
  transition: 0.5s;
}

.search-merch::after{
  content: "";
  clear: both;
  display: table;
} 
</style>
<div>
<form  method="POST" action="merchSearch.php">
        <div class="search-merch">
            <input type="text" placeholder="Enter keyword of what you looking for..." name="keyword">
            <button name="submitSearch" type="submit" value="Search"><i class="fas fa-search"></i></button><br>
        </div>
    </form>
</div>

</html>