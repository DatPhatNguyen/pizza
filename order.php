<!DOCTYPE html>
<html>

<head>
    <title>The Generics | Store</title>
    <meta name="description" content="This is the description">
    <link rel="stylesheet" href="styles.css" />
    <script src="store.js" async>
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <?php include './template/header.php';?>;

    <section class="container content-section">
        <h2 class="section-header">Order</h2>
        <div class="shop-items row text-center">
            <div class="shop-item col-12 col-sm-6 col-md-6 col-lg-4">
                <span class="shop-item-title">Pizza 1</span>
                <img class="shop-item-image" src="./images/pizza-1.jpg">
                <div class="shop-item-details ">
                    <span class="shop-item-price">$12.99</span>
                    <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                </div>
            </div>
            <div class="shop-item col-12 col-sm-6 col-md-6 col-lg-4">
                <span class="shop-item-title">Pizza</span>
                <img class="shop-item-image" src="./images/pizza-2.jpg">
                <div class="shop-item-details">
                    <span class="shop-item-price">$14.99</span>
                    <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                </div>
            </div>
            <div class="shop-item col-12 col-sm-6 col-md-6 col-lg-4">
                <span class="shop-item-title">Pizza </span>
                <img class="shop-item-image" src="./images/pizza-3.jpg">
                <div class="shop-item-details">
                    <span class="shop-item-price">$9.99</span>
                    <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                </div>
            </div>
            <div class="shop-item col-12 col-sm-6 col-md-6 col-lg-4">
                <span class="shop-item-title">Pizza </span>
                <img class="shop-item-image" src="./images/pizza-4.jpg">
                <div class="shop-item-details">
                    <span class="shop-item-price">$19.99</span>
                    <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                </div>
            </div>
            <div class="shop-item col-12 col-sm-6 col-md-6 col-lg-4">
                <span class="shop-item-title">Pizza </span>
                <img class="shop-item-image" src="./images/pizza-5.jpg">
                <div class="shop-item-details">
                    <span class="shop-item-price">$19.99</span>
                    <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                </div>
            </div>
            <div class="shop-item col-12 col-sm-6 col-md-6 col-lg-4">
                <span class="shop-item-title">Pizza </span>
                <img class="shop-item-image" src="./images/pizza-6.jpg">
                <div class="shop-item-details">
                    <span class="shop-item-price">$19.99</span>
                    <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                </div>
            </div>
            <div class="shop-item col-12 col-sm-6 col-md-6 col-lg-4">
                <span class="shop-item-title">Pizza </span>
                <img class="shop-item-image" src="./images/pizza-7.jpg">
                <div class="shop-item-details">
                    <span class="shop-item-price">$19.99</span>
                    <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                </div>
            </div>
            <div class="shop-item col-12 col-sm-6 col-md-6 col-lg-4">
                <span class="shop-item-title">Pizza </span>
                <img class="shop-item-image" src="./images/pizza-8.jpg">
                <div class="shop-item-details">
                    <span class="shop-item-price">$19.99</span>
                    <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                </div>
            </div>
            <div class="shop-item col-12 col-sm-6 col-md-6 col-lg-4">
                <span class="shop-item-title">Pizza </span>
                <img class="shop-item-image" src="./images/pizza-9.jpg">
                <div class="shop-item-details">
                    <span class="shop-item-price">$19.99</span>
                    <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                </div>
            </div>
        </div>
    </section>

    <section class="container content-section">
        <h2 class="section-header">CART</h2>
        <div class="cart-row">
            <span class="cart-item cart-header cart-column">ITEM</span>
            <span class="cart-price cart-header cart-column">PRICE</span>
            <span class="cart-quantity cart-header cart-column">QUANTITY</span>
        </div>
        <div class="cart-items"></div>
        <div class="cart-total">
            <strong class="cart-total-title">Total:</strong>
            <span class="cart-total-price">$0</span>
        </div>
        <div class="text-center"><button class="btn btn-primary btn-purchase" type="button"
                style="font-size: 1.2em;">PURCHASE</button></div>
    </section>
    <?php include './template/footer.php';?>
</body>

</html>