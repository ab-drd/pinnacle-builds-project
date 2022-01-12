<!DOCTYPE html>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <title>Pinnacle Builds | Cart</title>
        <link rel="icon" href="./images/icon.png">
        <link rel="stylesheet" href="styles/cart.css">
    </head>
    <body>
        <?php require_once "./src/header.php"?>
        <main>

            <nav>
              <ul class="infoTabs">
                <li id ="priceText">Total price: 15000,00 kn</li>
                <button id="checkout">Checkout</button>
              </ul>
            </nav>

            <ul class="cart">

              <li class="cartTemplate">
                  <div id="box-nav">
                    <h1>Battlebox</h1>
                    <span class="itemRemove">&times;</span>
                  </div>
                  <img id="cart-img" src="images/dbpic/pc_case/NZXT H510.jpg" height="200px" width="200px">
                  <ul id="componentList">

                      <li class="compElem">
                        <h2>CPU</h2>
                        <p>AMD Ryzen 5 1600</p>
                      </li>
                      <li class="compElem">
                        <h2>Motherboard</h2>
                        <p>MSI B450M Mortar MAX</p>
                      </li>
                      <li class="compElem">
                        <h2>RAM</h2>
                        <p>CORSAIR Vengeance LPX White, 2x8GB</p>
                      </li>
                      <li class="compElem">
                        <h2>CPU Cooler</h2>
                        <p>Cooler Master Hyper 212 Black Edition</p>
                      </li>
                      <li class="compElem">
                        <h2>GPU</h2>
                        <p>Asus Dual GTX 1060 6G OC</p>
                      </li>
                      <li class="compElem">
                        <h2>SSD</h2>
                        <p>Samsung 970 Evo Plus 1TB</p>
                      </li>
                      <li class="compElem">
                        <h2>HDD</h2>
                        <p>Seagate BarraCuda 1TB</p>
                      </li>
                      <li class="compElem">
                        <h2>PSU</h2>
                        <p>Corsair TX550M</p>
                      </li>
                      <li class="compElem">
                        <h2>Case</h2>
                        <p>NZXT H510</p>
                      </li>

                  </ul>
              </li>
              
            </ul>
            
        </main>
        <?php require_once "./src/footer.html" ?>
   </body>

<div id="cartTemplate" hidden>
    <div id="box-nav">
      <h1>Battlebox</h1>
      <span class="itemRemove">&times;</span>
    </div>
    <img height="200px" width="200px">
    <ul id="componentList"></ul>
</div>

<div id="compElem" hidden>
  <h2>{COMPONENT_CLASS}</h2>
  <p>{COMPONENT_NAME}</p>
</div>
 
</html>