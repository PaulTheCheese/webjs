$(document).ready(function() {
    // Smooth scroll for navigation links
    $('nav ul li a').click(function(e) {
        e.preventDefault();
        const targetSection = $(this).attr('href');
        $('html, body').animate({
            scrollTop: $(targetSection).offset().top - 50
        }, 800);
    });

    // Show more content when "Learn More" button is clicked
    $('#learnMore').click(function() {
        $('#hiddenContent').slideToggle();
    });

    // Show extra description in Features section
    $('#showMoreFeature').click(function() {
        $('#extraDescription').fadeToggle();
    });

    $('#whyUS').click(function() {
        $('#chooseUs').text('We stand out because of our customer support, innovative features, and reliability');
    });

    // Hover effect for Learn More button
    $('#learnMore').hover(
        function() {
            $(this).css('background-color', '#CBD2A4').css('color', '#54473F');
        },
        function(){
            $(this).css('background-color', '').css('color', '');
        }
    );

    // Form validation and submission handling
    $('#contactForm').submit(function(e) {
        e.preventDefault();
        const name = $('#name').val();
        const email = $('#email').val();
        
        if (name && email) {
            $('#formMessage').text(`Thank you, ${name}. We will contact you at ${email}.`).addClass('text-success');
        } else {
            $('#formMessage').text('Please fill out the form completely.').addClass('text-danger');
        }
    });
});
