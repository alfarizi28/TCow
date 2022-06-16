<script>
    // set active link in navbar
    // if home page
    if (window.location.pathname == '/TCow/Views/landing.php') {
        document.getElementById('home').classList.add('active');
    }
    // if about page
    else if (window.location.pathname == '/TCow/Views/pages/sapi.php') {
        document.getElementById('sapi').classList.add('active');
    }
    // if sapi page
    else if (window.location.pathname == '/TCow/Views/pages/produk.php') {
        document.getElementById('produk').classList.add('active');
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
