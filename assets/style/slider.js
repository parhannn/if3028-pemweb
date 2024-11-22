var indeks_slide = 1;
showSlides(indeks_slide);

function plusSlides(banyak_slide)
{
    showSlides(indeks_slide += banyak_slide);
}

function showSlides(banyak_slide)
{
    var slides = document.getElementsByClassName("slide");

    if (banyak_slide > slides.length)
    {
        indeks_slide = 1;
    }

    if (banyak_slide < 1)
    {
        indeks_slide = slides.length;
    }

    for (var i = 0; i < slides.length; i++)
    {
        slides[i].style.display = "none";
    }

    slides[indeks_slide - 1].style.display = "block";
}