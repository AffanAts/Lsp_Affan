<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>JeWePe Article</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
  <link rel="stylesheet" href="style/style.css" />
  <link rel="stylesheet" href="style/search.css">
</head>

<body class="fullpage">
  <div class="">
    <?php include '../../component/header.php'; ?>
    <main>
      <div class="container">
        <div class="row height d-flex justify-content-center align-items-center">
          <div class="col-md-6">
            <div class="form">
              <i class="fa fa-search"></i>
              <input type="text" class="form-control form-input" placeholder="Search anything..." />
            </div>
          </div>
        </div>
      </div>
      <div class="row row-cols-1 row-cols-md-3 g-4 mt-5 mx-4">
        <div class="col">
          <div class="card">
            <img src="/Images/articles.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional
                content. This content is a little bit longer.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="/Images/articles.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional
                content. This content is a little bit longer.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="/Images/articles.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional
                content.</p>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</body>
</html>