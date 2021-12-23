<!DOCTYPE html>
<html>

    <head>
        <meta charset="uft-8">
        <title>Pinnacle Builds</title>
        <link rel="stylesheet" href="styles/style.css"/>
        <link rel="icon" href="images/icon.png">
    </head>

    <body>  

      <?php require_once "./src/header.php"?>

      <main>
          <div class="slidershow middle">

              <div class="slides">

                <input type="radio" name="r" id="r1" checked>
                <input type="radio" name="r" id="r2">
                <input type="radio" name="r" id="r3">
                <input type="radio" name="r" id="r4">
                <input type="radio" name="r" id="r5">

                <div class="slide s1">
                  <img src="images/customPCExotic.png" alt="1"/>
                </div>

                <div class="slide">
                  <img src="images/customPCWhite.png" alt="2"/>
                </div>

                <div class="slide">
                  <img src="images/PCSetup.png" alt="3"/>
                </div>

                <div class="slide">
                  <img src="images/customPCFractal.png" alt="4"/>
                </div>

                <div class="slide">
                  <img src="images/customPCAir.png" alt="5"/>
                </div>

                  <div class="navigation-auto">
                  <div class="auto-btn1"></div>
                  <div class="auto-btn2"></div>
                  <div class="auto-btn3"></div>
                  <div class="auto-btn4"></div>
                  <div class="auto-btn5"></div>
                  </div>
              </div>

              <div class="navigation">
                <label for="r1" class="bar"></label>
                <label for="r2" class="bar"></label>
                <label for="r3" class="bar"></label>
                <label for="r4" class="bar"></label>
                <label for="r5" class="bar"></label>
              </div>

            </div>
            <div id="article-container">
            <article class="article-card">
              <figure class="article-image">
                <img src="images/prebuiltAd.jpg" alt="buidler">
              </figure>
              <div class="article-content">
                <h3 class="title">Prebuilds</h3>
                <p class="paragraph">
                    If you have no idea how to build a PC yourself,
                    we offer you a huge variety of prebuilt computers
                    made for every individual’s specific wants and needs.
                </p>
                <p class="paragraph">
                    Buying a prebuilt computer may cost you less 
                    than buying the components and building it yourself.
                    Our affordable prices and the pridjev compatibility 
                    among the components will make you want to use exactly 
                    this site. We offer you the best service.
                <p class="paragraph">
                    If you want to change few parts in prebuilt PC, we will 
                    give you the PROS and CONS in doing that.
                </p>
                </div>
              </article>

              <article class="article-card">
                <div class="article-content">
                  <figure class="article-image" id="slika">
                    <img src="images/builderAd.jpg" alt="buidler">
                  </figure>
                  <h3 class="title">Builder info</h3>
                  <p class="paragraph">
                    Our builder gives you the opportunity to build yourself 
                    your personalized PC. Besides the large selection of components, we offer you the possibility 
                    to give you suggestions.
                  </p>
                  <p class="paragraph">
                    Based on your choiceof components, we give you the compatible component 
                    and the explanation behind our choice. 
                    This will save your time a big time.
                  </p>
                  </div>
                </article>

            </div>
            
      </main>
      <?php require_once "./src/footer.html" ?>
      <script src="scripts/index.js"></script>
    </body>

</html>