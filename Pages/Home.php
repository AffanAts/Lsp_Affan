<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>JeWePe Article</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style/style.css" />
  </head>
  <body class="fullpage">
    <div class="">
    <?php include '../component/header.php'; ?>
      <main>
        <div class="container col-xxl-8 px-4 py-5">
          <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
              <img
                src="../Images/articles.png"
                class="d-block mx-lg-auto img-fluid"
                alt="Bootstrap Themes"
                width="700"
                height="500"
                loading="lazy"
              />
            </div>
            <div class="col-lg-6">
              <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">
                JeWePe Article
              </h1>
              <p class="lead">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Vestibulum et arcu bibendum, tristique velit vitae, pretium
                elit. Suspendisse scelerisque erat quis nunc dictum fringilla.
                Curabitur nec commodo odio. Nulla nec sapien pulvinar, aliquam
                nisi non, ullamcorper massa. Phasellus tincidunt quis diam ac
                vehicula. Sed mollis eleifend semper.
              </p>
            </div>
          </div>
        </div>
      </main>
      <?php include '../component/footer.php'; ?>
    </div>
  </body>
</html>
