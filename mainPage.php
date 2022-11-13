<!Doctype html>  
<html>     
<head>  
<link rel="stylesheet" href="index.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">       
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<title>     
Management Stocuri
</title>  
</head>  
<body>   
<div class="topnav">
    <a class="active" href="mainPage.php">
    <span class="material-icons">
home
</span>
    </a>
    <a href="ochi.php">Ochi</a>
    <a href="buze.php">Buze</a>
    <a href="ten.php">Ten</a>
    <a href="seturi.php">Seturi</a>
    <div class="search-container">
      <form action="/action_page.php">
        <input type="text" placeholder="Cautare..." name="search">
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>
    <a href="signUp.php">
    <span class="material-icons">
logout
</span>
    </a>
  </div>
  
  <div style="padding-left:16px">

  </div>
  <div class="stocuriImg">
    <img src="Demoimg.png">
  </div>

  <div class="graphClass" style="padding-left: 300px;">
    <table class="graph">
      <caption>Statisica lunara vanzari</caption>
      <thead>
        <tr>
          <th scope="col">Produs</th>
          <th scope="col">Vanzari</th>
        </tr>
      </thead><tbody>
        <tr style="height:85%">
          <th scope="row">Produse ochi</th>
          <td><span>85%</span></td>
        </tr>
        <tr style="height:23%">
          <th scope="row">Produse ten</th>
          <td><span>23%</span></td>
        </tr>
        <tr style="height:7%">
          <th scope="row">Produse buze</th>
          <td><span>7%</span></td>
        </tr>
        <tr style="height:38%">
          <th scope="row">Seturi</th>
          <td><span>38%</span></td>
        </tr>
      </tbody>
    </table>
  </div>

</body>   
</html>  
