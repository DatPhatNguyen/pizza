 <?php
    include('./config/db_connect.php');
    // write sql query
    $sql = 'SELECT title, ingredients ,id from pizzas ORDER BY created_at';
    // make query and get result
    $result = mysqli_query($conn, $sql);
    // fetch the resulting rows as an array
    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // free result from memory
    mysqli_free_result($result);
    // close connection
    mysqli_close($conn);
    // print_r(explode(',',$pizzas[0]['ingredients']));
?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Pizza Hot</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
     <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

 </head>

 <body>
     <?php include ('./template/header.php');?>
     <!-- Carousel -->
     <div class="carousel">
         <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
             <div class="carousel-inner">
                 <div class="carousel-item active" data-bs-interval="2000">
                     <img src="./images/banner-1.jpg" class="d-block w-100" alt="..."
                         style="height:1000px; object-fit:cover; oject-position:center">
                 </div>
                 <div class="carousel-item" data-bs-interval="1500">
                     <img src="./images/banner-2.jpg" class="d-block w-100" alt="..."
                         style="height:1000px; object-fit:cover; oject-position:center">
                 </div>
                 <div class="carousel-item" data-bs-interval="1500">
                     <img src="./images/banner-3.jpg" class="d-block w-100" alt="..."
                         style="height:1000px; object-fit:cover; oject-position:center">
                 </div>
                 <div class="carousel-item " data-bs-interval="1500">
                     <img src="./images/banner-4.jpg" class="d-block w-100" alt="..."
                         style="height:1000px; object-fit:cover; oject-position:center">
                 </div>
             </div>
             <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                 data-bs-slide="prev">
                 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                 <span class="visually-hidden">Previous</span>
             </button>
             <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                 data-bs-slide="next">
                 <span class="carousel-control-next-icon" aria-hidden="true"></span>
                 <span class="visually-hidden">Next</span>
             </button>
         </div>
     </div>
     <!-- Order State -->
     <h1 class="text-uppercase text-center black-text my-5" style="font-weight:900; letter-spacing:3px; font-size:60px;"
         data-aos="fade-down-right"> - Pizzas! -
     </h1>
     <div class="container-fluid">
         <div class="row bg-light pt-2 pb-4 px-4">
             <?php foreach($pizzas as $pizza) :?>
             <div class="col-md-4 mt-5">
                 <div class="card">
                     <img src="./images/pizza.svg" alt="" class="pizza-image">
                     <div class="card-body text-center p-4">
                         <h4 class=""><?php echo htmlspecialchars($pizza['title']); ?></h4>
                         <ul class="list-unstyled lh-lg">
                             <?php foreach(explode(',',$pizza['ingredients']) as $ing) : ?>
                             <li> <?php echo htmlspecialchars($ing);?> </li>
                             <?php endforeach; ?>
                         </ul>
                     </div>
                     <div class="card-footer text-end">
                         <a href="detail.php?id=<?php echo $pizza['id']?>"
                             class="text-primary text-capitalize text-decoration-none">More infor</a>
                     </div>
                 </div>
             </div>
             <?php endforeach; ?>
         </div>

         <!-- Decoration -->
         <section class="decoration bg-light mt-5 p-5">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-xl-4 col-lg-4 col-md-4 text-center">
                         <img src="./images/plate-decoration-img.png" alt="" class="decoration-image mb-2"
                             style="width:90px; height:90px;">
                         <h3 class="decoration-title  text-uppercase">order your food</h3>
                         <p class="decoration-desc font-weight-light mt-2" style="font-size:13px; line-height:1.4;">
                             Lorem
                             ipsum, dolor sit amet
                             consectetur
                             adipisicing elit. Iusto est
                             facilis molestiae, illo officiis iste voluptatibus adipisci quod consequuntur sequi.
                             Voluptas cumque earum tenetur temporibus enim rem magnam tempora? Fugiat!</p>
                     </div>
                     <div class="col-xl-4 col-lg-4 col-md-4 text-center">
                         <img src="./images/delivery-decoration-image-removebg-preview.png" alt=""
                             class="decoration-image mb-2" style="width:90px; height:90px;">
                         <h3 class="decoration-title text-uppercase">delivery or pick up</h3>
                         <p class="decoration-desc font-weight-light mt-2" style="font-size:13px; line-height:1.4;">
                             Lorem
                             ipsum, dolor sit amet
                             consectetur
                             adipisicing elit. Iusto est
                             facilis molestiae, illo officiis iste voluptatibus adipisci quod consequuntur sequi.
                             Voluptas cumque earum tenetur temporibus enim rem magnam tempora? Fugiat!</p>
                     </div>
                     <div class="col-xl-4 col-lg-4 col-md-4 text-center">
                         <img src="./images/pizza-decoration-image-removebg-preview.png" alt=""
                             class="decoration-image mb-2" style="width:90px; height:90px;">
                         <h3 class="decoration-title text-uppercase">delicious receipe</h3>
                         <p class="decoration-desc font-weight-light mt-2" style="font-size:13px; line-height:1.4;">
                             Lorem
                             ipsum, dolor sit amet
                             consectetur
                             adipisicing elit. Iusto est
                             facilis molestiae, illo officiis iste voluptatibus adipisci quod consequuntur sequi.
                             Voluptas cumque earum tenetur temporibus enim rem magnam tempora? Fugiat!</p>
                     </div>
                 </div>
             </div>
         </section>

         <section class="speciality bg-light p-3 mt-5">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-xl-12 col-12 col-md-12">
                         <div class="speciality-part text-center my-3 ">
                             <p class="text-capitalize fst-italic fw-light"
                                 style="font-size:26px; color:#fd9d3e; letter-spacing:3px;">fresh from pizza</p>
                             <h1 class="text-uppercase font-weight-bold"
                                 style="letter-spacing:3px; font-weight:900; font-size:60px;">our
                                 speciality</h1>
                         </div>
                     </div>
                 </div>
                 <div class="row px-4">
                     <div class="col-xl-4 col-lg-4 col-md-4 text-center">
                         <img src="./images/pizza-2.jpg"
                             style="height:250px; width:90%; border-radius:50%; cursor:pointer" class="speciality-image"
                             alt="">
                         <p class="text-capitalize my-4" style="font-weight:700; font-size:20px;">indian pizza</p>
                     </div>
                     <div class="col-xl-4 col-lg-4 col-md-4 text-center">
                         <img src="./images/pizza-4.jpg"
                             style="height:250px; width:90%; border-radius:50%; cursor:pointer" class="speciality-image"
                             alt="">
                         <p class="text-capitalize my-4" style="font-weight:700; font-size:20px;">vegetarian pizza
                         </p>

                     </div>
                     <div class="col-xl-4 col-lg-4 col-md-4 text-center">
                         <img src="./images/pizza-6.jpg"
                             style="height:250px; width:90%; border-radius:50%; cursor:pointer" class="speciality-image"
                             alt="">
                         <p class="text-capitalize my-4" style="font-weight:700; font-size:20px;">Cheese Sauce Pizza
                         </p>
                     </div>
                 </div>
             </div>
         </section>

         <!-- Menu -->
         <h1 class="menu-title my-5 text-center text-uppercase" style="font-weight:900;font-size:60px;" id="our-menu"
             data-aos="fade-down-left"> - our menu -
         </h1>
         <div id="menu" class="bg-light p-5 container-fluid">
             <div class="row ">
                 <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-3" data-aos="fade-right">
                     <div class="card text-center  index-card">
                         <img src="./images/pizza-1.jpg" alt="" class="card-img-top">
                         <div class="card-body">
                             <h5 class="card-title text-capitalize">Cheese Pizza</h5>
                             <div class="card-text"></div>
                         </div>
                         <div class="card-footer d-flex align-items-center justify-content-around py-3">
                             <input type="number" min="1" max="100" step="1" style="width:20%" class="rounded p-1"
                                 placeholder="1">
                             <button class="btn btn-danger submit btn-sm p-2 rounded-pill" style="width:70%">Add To
                                 Cart</button>
                         </div>
                     </div>
                 </div>
                 <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-3" data-aos="fade-right">
                     <div class="card text-center index-card">
                         <img src="./images/pizza-2.jpg" alt="" class="card-img-top">
                         <div class="card-body">
                             <h5 class="card-title text-capitalize">Indian Pizza</h5>
                             <div class="card-text"></div>
                         </div>
                         <div class="card-footer d-flex align-items-center justify-content-around py-3">
                             <input type="number" min="1" max="100" step="1" style="width:20%" class="rounded p-1"
                                 placeholder="1">
                             <button class="btn btn-danger submit btn-sm p-2 rounded-pill" style="width:70%">Add To
                                 Cart</button>
                         </div>
                     </div>
                 </div>
                 <div class="col-12 col-sm-6 col-md-6 col-lg-4  mb-3" data-aos="fade-right">
                     <div class="card text-center index-card">
                         <img src="./images/pizza-3.jpg" alt="" class="card-img-top">
                         <div class="card-body">
                             <h5 class="card-title text-capitalize"> Sweet Pizza</h5>
                             <div class="card-text"></div>
                         </div>
                         <div class="card-footer d-flex align-items-center justify-content-around py-3">
                             <input type="number" min="1" max="100" step="1" style="width:20%" class="rounded p-1"
                                 placeholder="1">
                             <button class="btn btn-danger submit btn-sm p-2 rounded-pill" style="width:70%">Add To
                                 Cart</button>
                         </div>
                     </div>
                 </div>
                 <div class="col-12 col-sm-6 col-md-6 col-lg-4  mb-3">
                     <div class="card text-center index-card" data-aos="fade-left">
                         <img src="./images/pizza-4.jpg" alt="" class="card-img-top">
                         <div class="card-body">
                             <h5 class="card-title text-capitalize">Vegetarian Pizza</h5>
                             <div class="card-text"></div>
                         </div>
                         <div class="card-footer d-flex align-items-center justify-content-around py-3">
                             <input type="number" min="1" max="100" step="1" style="width:20%" class="rounded p-1"
                                 placeholder="1">
                             <button class="btn btn-danger submit btn-sm p-2 rounded-pill" style="width:70%">Add To
                                 Cart</button>
                         </div>
                     </div>
                 </div>
                 <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-3">
                     <div class="card text-center index-card" data-aos="fade-left">
                         <img src="./images/pizza-5.jpg" alt="" class="card-img-top">
                         <div class="card-body">
                             <h5 class="card-title  text-capitalize">Mushroom Pizza</h5>
                             <div class="card-text"></div>
                         </div>
                         <div class="card-footer d-flex align-items-center justify-content-around py-3">
                             <input type="number" min="1" max="100" step="1" style="width:20%" class="rounded p-1"
                                 placeholder="1">
                             <button class="btn btn-danger submit btn-sm p-2 rounded-pill" style="width:70%">Add To
                                 Cart</button>
                         </div>
                     </div>
                 </div>
                 <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-3">
                     <div class="card text-center index-card" data-aos="fade-left">
                         <img src="./images/pizza-6.jpg" alt="" class="card-img-top">
                         <div class="card-body">
                             <h5 class="card-title  text-capitalize">Cheese Sauce Pizza </h5>
                             <div class="card-text"></div>
                         </div>
                         <div class="card-footer d-flex align-items-center justify-content-around py-3">
                             <input type="number" min="1" max="100" step="1" style="width:20%" class="rounded p-1"
                                 placeholder="1">
                             <button class="btn btn-danger submit btn-sm p-2 rounded-pill" style="width:70%">Add To
                                 Cart</button>
                         </div>
                     </div>
                 </div>
                 <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-3">
                     <div class="card text-center index-card" data-aos="fade-down">
                         <img src="./images/pizza-7.jpg" alt="" class="card-img-top">
                         <div class="card-body">
                             <h5 class="card-title  text-capitalize">squid pizza</h5>
                             <div class="card-text"></div>
                         </div>
                         <div class="card-footer d-flex align-items-center justify-content-around py-3">
                             <input type="number" min="1" max="100" step="1" style="width:20%" class="rounded p-1"
                                 placeholder="1">
                             <button class="btn btn-danger submit btn-sm p-2 rounded-pill " style="width:70%">Add To
                                 Cart</button>
                         </div>
                     </div>
                 </div>
                 <div class="col-12 col-sm-6 col-md-6 col-lg-4  mb-3">
                     <div class="card text-center index-card" data-aos="fade-down">
                         <img src="./images/pizza-8.jpg" alt="" class="card-img-top">
                         <div class="card-body">
                             <h5 class="card-title  text-capitalize">vegetable pizza</h5>
                             <div class="card-text"></div>
                         </div>
                         <div class="card-footer d-flex align-items-center justify-content-around py-3">
                             <input type="number" min="1" max="100" step="1" style="width:20%" class="rounded p-1"
                                 placeholder="1">
                             <button class="btn btn-danger submit btn-sm p-2 rounded-pill" style="width:70%">Add To
                                 Cart</button>
                         </div>
                     </div>
                 </div>
                 <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-3">
                     <div class="card text-center index-card" data-aos="fade-down">
                         <img src="./images/pizza-9.jpg" alt="" class="card-img-top">
                         <div class="card-body">
                             <h5 class="card-title  text-capitalize">Cheese mushroom pizza</h5>
                             <div class="card-text"></div>
                         </div>
                         <div class="card-footer d-flex align-items-center justify-content-around py-3">
                             <input type="number" min="1" max="100" step="1" style="width:20%" class="rounded p-1"
                                 placeholder="1">
                             <button class="btn btn-danger submit btn-sm p-2 rounded-pill" style="width:70%">Add To
                                 Cart</button>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <h1 class="blog-title my-5 text-center" style="font-weight:900;letter-spacing:3px; font-size:60px;"
         data-aos="fade-down" id="blog">
         - Blog - </h1>
     <div class="bg-light blog">
         <div class="blog-container container-fluid py-3 px-4">
             <h4 class="blog-container__title my-3 text-secondary" style="font-weight:900">Different Pizza Types For
                 Different
                 Palates</h4>
             <div class="blog-image">
                 <img src="./images/pizza-blog-1.jpg" alt="" class="img-1 w-100 " data-aos="flip-right">
             </div>
             <div class="blog-content">
                 <p class="blog-content__text my-4 text-secondary">There are dozens of famous pizzas that appeal to
                     different palates
                     specially in the USA and Italy. In addition to the ready-made pizzas that are available at pizza
                     restaurants you can also choose pizzas with only the ingredients you want to eat.</p>
             </div>
             <h4 class="blog-container__title mt-5 mb-3 text-secondary" style="font-weight:900">Vegetarian Pizza</h4>
             <div class="blog-content">
                 <p class="blog-content__text my-4 text-secondary">The vegetarian pizzas are made mainly for
                     consumers
                     who prefer vegetables and generally ingredients such as peppers, mushrooms, tomatoes, cheddar,
                     Mozzarella, olives, onions and corn are used. In case there are any ingredients in the pizza
                     which
                     you do not like you can have it removed or have the ones you like added on more. Vegetarian
                     pizza,
                     often preferred by people who do not eat meat, contains less calories in comparison with other
                     selections.</p>
             </div>
             <h4 class="blog-container__title mt-5 mb-3 text-secondary" style="font-weight:900">Neapolitan Pizza</h4>
             <div class="blog-content">
                 <p class="blog-content__text my-4 text-secondary">Neapolitan pizza, which is one of the most popular
                     among pizza varieties, appeals to all tastes due to its abundant of ingredients. This type of
                     pizza
                     meets expectations of consumers who enjoy intense flavors, which ingredients such as sausage,
                     salami, tomatoes, onions, mushrooms, olives, corn, cheese and eggs are used.</p>
             </div>
             <h4 class="blog-container__title mt-5 mb-3 text-secondary" style="font-weight:900">New York Pizza</h4>
             <div class="blog-content">
                 <p class="blog-content__text my-4 text-secondary">The New York pizza type, which is popular with
                     children, is more appealing to people who enjoy simple delicacies. This, light and easy to
                     digest
                     pizza is made of tomatoes, cheddar and onion on a thin crust. There is also a variant of this
                     pizza
                     made with ground mutton. You can make a choice based on your palate.</p>
             </div>
             <h4 class="blog-container__title mt-5 mb-3 text-secondary" style="font-weight:900">Chicago Pizza</h4>
             <div class="blog-content">
                 <p class="blog-content__text my-4 text-secondary">The Chicago pizza type, which has a different
                     structure than the other pizzas, is known as deep-dish pizza with high edges and thick layer of
                     toppings. The pizza which usually contains tomatoes and cheese gives it a layered appearance.
                     The
                     Chicago pizza, which you can add different ingredients depending on your wishes, is also a thick
                     crust pizza.</p>
             </div>
             <h4 class="blog-container__title mt-5 mb-3 text-secondary" style="font-weight:900">Pizza Margherita</h4>
             <div class="blog-content">
                 <p class="blog-content__text my-4 text-secondary">This pizza variant named after Queen Margherita is
                     while also the first pizza made, it contains tomatoes, Mozzarella and basil. This variant loved
                     by
                     the Italian people emerged during the poverty and wartime period, in which Italian women would
                     add
                     ingredients that were available on the dough</p>
             </div>
             <h4 class="blog-container__title mt-5 mb-3 text-secondary" style="font-weight:900">Tips For the Perfect
                 Pizza</h4>
             <div class="blog-image">
                 <img src="./images/pizza-blog-1.jpg" alt="" class="img-1 w-100" data-aos="flip-left">
             </div>
             <div class=" blog-content">
                 <p class="blog-content__text my-4 text-secondary">The most important point of making a pizza is the
                     dough and the
                     cooking method. Although pizza dough is a changing concept based on different palates,
                     pizzaiolos
                     suggest that the dough should be as thin as possible. It is believed that a more delicious pizza
                     can
                     be obtained by focusing more on toppings rather than the dough. The pizza dough is as important
                     as
                     baking it. <br /> <br />After all the ingredients have been added, the pizza should be placed on
                     a
                     higher
                     rack in
                     the oven. Thus, ingredients are cooked at the same time as the dough. You can also eat the pizza
                     only with spices or sauces such as ketchup, mayonnaise, Ranch and mustard</p>
             </div>
         </div>
     </div>
     <section class="chef p-3 mt-5 bg-light">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-xl-12 col-12 col-md-12">
                     <div class="chef-heading-part text-center my-3 ">
                         <p class="text-capitalize fst-italic fw-light"
                             style="font-size:26px; color:#fd9d3e; letter-spacing:3px;">meet
                             exprets</p>
                         <h1 class="text-uppercase font-weight-bold"
                             style="letter-spacing:3px; font-weight:900; font-size:60px;">our
                             best chef</h1>
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-3" data-aos="fade-right">
                     <div class="card text-center">
                         <img src="./images/portrait-1.jpg" alt="" class="card-img-top"
                             style="height:450px; object-fit:cover; object-position:center;">
                         <div class="card-body mt-2">
                             <h5 class="card-title text-capitalize">Gordon Ramsey</h5>
                             <div class="card-text text-capitalize  fst-italic">head chef</div>
                         </div>
                     </div>
                 </div>
                 <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-3" data-aos="fade-right">
                     <div class="card text-center">
                         <img src="./images/portrait-2.jpg" alt="" class="card-img-top"
                             style="height:450px; object-fit:cover; object-position:center;">
                         <div class="card-body mt-2">
                             <h5 class="card-title text-capitalize">Thomas Keller</h5>
                             <div class="card-text text-capitalize fst-italic">head chef</div>
                         </div>
                     </div>
                 </div>
                 <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-3" data-aos="fade-right">
                     <div class="card text-center">
                         <img src="./images/portrait-3.jpg" alt="" class="card-img-top"
                             style="height:450px; object-fit:cover; object-position:center;">
                         <div class="card-body mt-2">
                             <h5 class="card-title text-capitalize">heston blumenthal</h5>
                             <div class="card-text text-capitalize fst-italic">head chef</div>
                         </div>
                     </div>
                 </div>
                 <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-3" data-aos="fade-right">
                     <div class="card text-center">
                         <img src="./images/portrait-4.jpg" alt="" class="card-img-top"
                             style="height:450px; object-fit:cover; object-position:center;">
                         <div class="card-body mt-2">
                             <h5 class="card-title text-capitalize">emeril lagasse</h5>
                             <div class="card-text text-capitalize fst-italic">head chef</div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>


     <h1 class="review-title text-uppercase text-center my-5"
         style="font-weight:900; letter-spacing:3px; font-size:60px;" id="review-title" data-aos="fade-up">- review -
     </h1>
     <div id="review" class="container-fluid review-container bg-light p-5">
         <div class=" slide p-5 mb-4" data-aos="fade-right">
             <h4>Minh Hanh</h4>
             <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perspiciatis quaerat quibusdam
                 accusamus ipsum a laboriosam vero exercitationem sequi repudiandae? In sit nisi pariatur libero
                 cumque reprehenderit sint ut illum qui?</p>
             <div class="stars">
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
             </div>
         </div>
         <div class="slide p-5 mb-4" data-aos="fade-left">
             <h4>Dat Nguyen</h4>
             <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perspiciatis quaerat quibusdam
                 accusamus ipsum a laboriosam vero exercitationem sequi repudiandae? In sit nisi pariatur libero
                 cumque reprehenderit sint ut illum qui?</p>
             <div class="stars">
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
             </div>
         </div>
         <div class="slide p-5 mb-4" data-aos="fade-left">
             <h4>Truong An</h4>
             <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perspiciatis quaerat quibusdam
                 accusamus ipsum a laboriosam vero exercitationem sequi repudiandae? In sit nisi pariatur libero
                 cumque reprehenderit sint ut illum qui?</p>
             <div class="stars">
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
             </div>
         </div>
         <div class=" slide p-5 mb-4" data-aos="fade-right">
             <h4>John Doe</h4>
             <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis dicta possimus magnam, sequi eius
                 animi amet vero saepe veritatis nam a optio commodi minus porro exercitationem. Accusantium
                 similique quia officiis fugit itaque magnam, sit deleniti minus repellat maxime qui, nemo, amet
                 recusandae blanditiis nesciunt molestias.</p>
             <div class="stars">
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
             </div>
         </div>
         <div class=" slide p-5 mb-4" data-aos="fade-left">
             <h4>Alex</h4>
             <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam vel possimus officiis cum
                 inventore et quisquam expedita dicta quae tenetur dolor totam praesentium ullam officia
                 temporibus repellendus consequatur tempora autem repudiandae ex veritatis, facilis dolores.</p>
             <div class="stars">
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
             </div>
         </div>
         <div class="slide p-5" data-aos="fade-right">
             <h4>Peter</h4>
             <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum facere vel voluptatibus similique
                 incidunt veritatis nobis itaque. Vitae animi ratione a, quo minus doloremque quibusdam, officiis
                 numquam est placeat magnam temporibus. Suscipit provident totam magnam neque quam eveniet esse
                 unde.</p>
             <div class="stars">
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
             </div>
         </div>
     </div>
     <?php
        include('./template/footer.php');
    ?>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
     <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
     <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
     <script>
     AOS.init({
         offset: 300,
         duration: 600
     });
     </script>
     <script src="./script.js"></script>
 </body>