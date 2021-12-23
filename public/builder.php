<!DOCTYPE html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pinnacle builds | Custom PC</title>
  <link rel="icon" href="images/icon.png">
  <link rel="stylesheet" href="styles/builder.css"/>
  <script src="scripts/callComponent.js" defer></script>
</head>
<body>
  <?php require_once "./src/header.php"?>
  <main>
    <nav>
      <ul class="infoTabs">
        <li id ="priceText">Total price: 15000,00 kn</li>
        <li id= "border">|</li>
        <li id="TDPText">Estimated power draw: 480W</li>
      </ul>
    </nav>
    <div class=builderBox>
      <ul class=compContainer>

        <li class="compCPU">
          <button type="button" class="pickCompClass" id="cpu-button">
            <img src="images/componentCPU.png" height="64" width="64">
            <div class=componentText>
              <h1>CPU</h1>
              <h2>None</h2>
            </div>
          </button>
        </li>

        <li class="compMOBO">
          <button type="button" class="pickCompClass" id="mobo-button">
            <img src="images/componentMOBO.png" height="64" width="64">
            <div class=componentText>
              <h1>Motherboard</h1>
              <h2>None</h2>
            </div>
          </button>
        </li>

        <li class="compRAM">
          <button type="button" class="pickCompClass" id="ram-button">
            <img src="images/componentRAM.png" height="64" width="64">
            <div class=componentText>
              <h1>RAM</h1>
              <h2>None</h2>
            </div>
          </button>
        </li>

        <li class="compCOOL">
          <button type="button" class="pickCompClass" id="cool-button">
            <img src="images/componentCOOL.png" height="64" width="64">
            <div class=componentText>
              <h1>CPU Cooler</h1>
              <h2>None</h2>
            </div>
          </button>
        </li>

        <li class="compGPU">
          <button type="button" class="pickCompClass" id="gpu-button">
            <img src="images/componentGPU.png" height="64" width="64">
            <div class=componentText>
              <h1>GPU</h1>
              <h2>None</h2>
            </div>
          </button>
        </li>

        <li class="compSSD">
          <button type="button" class="pickCompClass" id="ssd-button">
            <img src="images/componentSSD.png" height="64" width="64">
            <div class=componentText>
              <h1>SSD</h1>
              <h2>None</h2>
            </div>
          </button>
        </li>

        <li class="compHDD">
          <button type="button" class="pickCompClass" id="hdd-button">
            <img src="images/componentHDD.png" height="64" width="64">
            <div class=componentText>
              <h1>HDD</h1>
              <h2>None</h2>
            </div>
          </button>
        </li>

        <li class="compPSU">
          <button type="button" class="pickCompClass" id="psu-button">
            <img src="images/componentPSU.png" height="64" width="64">
            <div class=componentText>
              <h1>PSU</h1>
              <h2>None</h2>
            </div>
          </button>
        </li>

        <li class="compCASE">
          <button type="button" class="pickCompClass" id="case-button">
            <img src="images/componentCASE.png" height="64" width="64">
            <div class=componentText>
              <h1>Case</h1>
              <h2>None</h2>
            </div>
          </button>
        </li>

      </ul>
      <div class="listBox">
        <div id="picker">
          <h1 id="pickerName">{CHOOSE_COMP}</h1>
        </div>
        <ul id="list"></ul>
      </div>
    </div>
  </main>
  <div id="template" hidden>
    <div class="iconName">
        <img src="{IMG_SRC}" height="64" width="64">
        <h1>{COMP_NAME}</h1>
    </div>
    <div class="infoPick">
        <button class="infoButt">ABOUT</button>
        <button class="pickButt">ADD</button>
    </div>
  </div>
  <?php require_once "./src/footer.html" ?>
</body>
</html>                                     