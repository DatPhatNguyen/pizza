<?php
	include('config/db_connect.php');
	$email = $title = $ingredients = '';
	$errors = array('email' => '', 'title' => '', 'ingredients' => '');

	if(isset($_POST['submit'])){
		// check email
		if(empty($_POST['email'])){
			$errors['email'] = 'An email is required';
		} else{
			$email = $_POST['email'];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email'] = 'Email must be a valid email address';
			}
		}
		// check title
		if(empty($_POST['title'])){
			$errors['title'] = 'A title is required';
		} else{
			$title = $_POST['title'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
				$errors['title'] = 'Title must be letters and spaces only';
			}
		}
		// check ingredients
		if(empty($_POST['ingredients'])){
			$errors['ingredients'] = 'At least one ingredient is required';
		} else{
			$ingredients = $_POST['ingredients'];
			if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
				$errors['ingredients'] = 'Ingredients must be a comma separated list';
			}
		}
		if(array_filter($errors)){
			//echo 'errors in form';
		} else {
			// escape sql chars
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$title = mysqli_real_escape_string($conn, $_POST['title']);
			$ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

			// create sql
			$sql = "INSERT INTO pizzas(title,email,ingredients) VALUES('$title','$email','$ingredients')";

			// save to db and check
			if(mysqli_query($conn, $sql)){
				// success
				header('Location: index.php');
			} else {
				echo 'query error: '. mysqli_error($conn);
			}
		}
	} // end POST check

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
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include('./template/header.php'); ?>;
    <section class="container secondary-text add-container mt-5">
        <h1 class="text-center text-uppercase add-title">add your pizza</h1>
        <form action="add.php" method="POST" class="add-form">
            <div class="mb-3">
                <label class="form-label">Your Email:</label>
                <input type="text" name="email" class="form-control" value="<?php echo htmlspecialchars($email) ?>">
                <div class="text-danger"><?php echo $errors['email']; ?></div>
            </div>
            <div class="mb-3">
                <label class="form-label">Pizza Title:</label>
                <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($title) ?>">
                <div class="text-danger"><?php echo $errors['title']; ?></div>
            </div>
            <div class="mb-3">
                <label class="form-label">Ingredients (comma separated):</label>
                <input type="text" name="ingredients" class="form-control"
                    value="<?php echo htmlspecialchars($ingredients) ?>">
                <div class="text-danger"><?php echo $errors['ingredients']; ?></div>
            </div>
            <div class="text-center">
                <input type="submit" name="submit" value="ADD MY ORDER"
                    class="btn btn-outline-primary btn-block mt-3 btn-add">
            </div>
        </form>
    </section>
    <!-- Menu -->
    <h1 class="menu-title my-5 text-center text-uppercase" id="our-menu" data-aos="fade-down-left">-- our menu --
    </h1>
    <div id="menu" class="bg-light p-5 container">
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
    <h1 class="blog-title my-5 text-center" data-aos="fade-down" id="blog">-- Blog --</h1>
    <div class="bg-light blog">
        <div class="blog-container container py-3 px-4">
            <h5 class="blog-container__title my-3 text-secondary font-weight-bold">Different Pizza Types For Different
                Palates</h5>
            <div class="blog-image">
                <img src="./images/pizza-blog-1.jpg" alt="" class="img-1 w-100 " data-aos="flip-right">
            </div>
            <div class="blog-content">
                <p class="blog-content__text my-4 text-secondary">There are dozens of famous pizzas that appeal to
                    different palates
                    specially in the USA and Italy. In addition to the ready-made pizzas that are available at pizza
                    restaurants you can also choose pizzas with only the ingredients you want to eat.</p>
            </div>
            <h5 class="blog-container__title mt-5 mb-3 text-secondary font-weight-bold">Vegetarian Pizza</h5>
            <div class="blog-content">
                <p class="blog-content__text my-4 text-secondary">The vegetarian pizzas are made mainly for consumers
                    who prefer vegetables and generally ingredients such as peppers, mushrooms, tomatoes, cheddar,
                    Mozzarella, olives, onions and corn are used. In case there are any ingredients in the pizza which
                    you do not like you can have it removed or have the ones you like added on more. Vegetarian pizza,
                    often preferred by people who do not eat meat, contains less calories in comparison with other
                    selections.</p>
            </div>
            <h5 class="blog-container__title mt-5 mb-3 text-secondary font-weight-bold">Neapolitan Pizza</h5>
            <div class="blog-content">
                <p class="blog-content__text my-4 text-secondary">Neapolitan pizza, which is one of the most popular
                    among pizza varieties, appeals to all tastes due to its abundant of ingredients. This type of pizza
                    meets expectations of consumers who enjoy intense flavors, which ingredients such as sausage,
                    salami, tomatoes, onions, mushrooms, olives, corn, cheese and eggs are used.</p>
            </div>
            <h5 class="blog-container__title mt-5 mb-3 text-secondary font-weight-bold">New York Pizza</h5>
            <div class="blog-content">
                <p class="blog-content__text my-4 text-secondary">The New York pizza type, which is popular with
                    children, is more appealing to people who enjoy simple delicacies. This, light and easy to digest
                    pizza is made of tomatoes, cheddar and onion on a thin crust. There is also a variant of this pizza
                    made with ground mutton. You can make a choice based on your palate.</p>
            </div>
            <h5 class="blog-container__title mt-5 mb-3 text-secondary font-weight-bold">Chicago Pizza</h5>
            <div class="blog-content">
                <p class="blog-content__text my-4 text-secondary">The Chicago pizza type, which has a different
                    structure than the other pizzas, is known as deep-dish pizza with high edges and thick layer of
                    toppings. The pizza which usually contains tomatoes and cheese gives it a layered appearance. The
                    Chicago pizza, which you can add different ingredients depending on your wishes, is also a thick
                    crust pizza.</p>
            </div>
            <h5 class="blog-container__title mt-5 mb-3 text-secondary font-weight-bold">Pizza Margherita</h5>
            <div class="blog-content">
                <p class="blog-content__text my-4 text-secondary">This pizza variant named after Queen Margherita is
                    while also the first pizza made, it contains tomatoes, Mozzarella and basil. This variant loved by
                    the Italian people emerged during the poverty and wartime period, in which Italian women would add
                    ingredients that were available on the dough</p>
            </div>
            <h5 class="blog-container__title mt-5 mb-3 text-secondary">Tips For the Perfect Pizza</h5>
            <div class="blog-image">
                <img src="./images/pizza-blog-2.jpg" alt="" class="img-1 w-100" data-aos="flip-left">
            </div>
            <div class=" blog-content">
                <p class="blog-content__text my-4 text-secondary">The most important point of making a pizza is the
                    dough and the
                    cooking method. Although pizza dough is a changing concept based on different palates, pizzaiolos
                    suggest that the dough should be as thin as possible. It is believed that a more delicious pizza can
                    be obtained by focusing more on toppings rather than the dough. The pizza dough is as important as
                    baking it. <br /> <br />After all the ingredients have been added, the pizza should be placed on a
                    higher
                    rack in
                    the oven. Thus, ingredients are cooked at the same time as the dough. You can also eat the pizza
                    only with spices or sauces such as ketchup, mayonnaise, Ranch and mustard</p>
            </div>
        </div>
    </div>
    <h1 class="review-title text-uppercase text-center my-5" id="review-title" data-aos="fade-up">-- review --</h1>
    <div id="review" class="container review-container bg-light p-5">
        <div class=" slide p-4 mb-3">
            <h5>Minh Hanh</h5>

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
        <div class=" slide p-4 mb-3">
            <h5>Dat Nguyen</h5>
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
        <div class=" slide p-4 mb-3">
            <h5>John Doe</h5>

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
        <div class=" slide p-4 mb-3">
            <h5>Alex</h5>
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
        <div class=" slide p-4">
            <h5>Peter</h5>
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

    <?php  include('./template/footer.php'); ?>

</body>

</html>