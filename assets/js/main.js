// Sidebar

function openNav() {
    document.getElementById("leftsidebar").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
function closeNav() {
    document.getElementById("leftsidebar").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}

// Topbar

window.onscroll = function () {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("top-menu").style.top = "50";
    } else {
        document.getElementById("top-menu").style.top = "0";
    }
}

// PERMOHONAN

// ADMIN
// create

function operatorCategory() {
    if (document.getElementById('radio1').checked) {
        document.getElementById('damfield').style.display = 'none';
        document.getElementById('hotelfield').style.display = 'block';
        document.getElementById('jasabogafield').style.display = 'none';
        document.getElementById('tpmfield').style.display = 'none';
    } else if (document.getElementById('radio2').checked) {
        document.getElementById('damfield').style.display = 'none';
        document.getElementById('hotelfield').style.display = 'none';
        document.getElementById('jasabogafield').style.display = 'none';
        document.getElementById('tpmfield').style.display = 'block';
    } else if (document.getElementById('radio3').checked) {
        document.getElementById('damfield').style.display = 'none';
        document.getElementById('hotelfield').style.display = 'none';
        document.getElementById('jasabogafield').style.display = 'block';
        document.getElementById('tpmfield').style.display = 'none';
    } else if (document.getElementById('radio4').checked) {
        document.getElementById('damfield').style.display = 'block';
        document.getElementById('hotelfield').style.display = 'none';
        document.getElementById('jasabogafield').style.display = 'none';
        document.getElementById('tpmfield').style.display = 'none';
    }
}

function adminCategory() {
    if (document.getElementById('radio1').checked) {
        document.getElementById('fieldkesmas').style.display = 'block';
        document.getElementById('fieldvisitasi').style.display = 'none';
    } else if (document.getElementById('radio2').checked) {
        document.getElementById('fieldkesmas').style.display = 'none';
        document.getElementById('fieldvisitasi').style.display = 'block';
    }
}

function permohonanCategory() {
    if (document.getElementById('radio1').checked) {
        document.getElementById('sectionall').style.display = 'block';
        document.getElementById('sectiondiproses').style.display = 'none';
        document.getElementById('sectionterverifikasi').style.display = 'none';
        document.getElementById('sectionvalidasi').style.display = 'none';
        document.getElementById('sectionlolos').style.display = 'none';
        document.getElementById('sectionditolak').style.display = 'none';
    } else if (document.getElementById('radio2').checked) {
        document.getElementById('sectionall').style.display = 'none';
        document.getElementById('sectiondiproses').style.display = 'block';
        document.getElementById('sectionterverifikasi').style.display = 'none';
        document.getElementById('sectionvalidasi').style.display = 'none';
        document.getElementById('sectionlolos').style.display = 'none';
        document.getElementById('sectionditolak').style.display = 'none';
    } else if (document.getElementById('radio3').checked) {
        document.getElementById('sectionall').style.display = 'none';
        document.getElementById('sectiondiproses').style.display = 'none';
        document.getElementById('sectionterverifikasi').style.display = 'block';
        document.getElementById('sectionvalidasi').style.display = 'none';
        document.getElementById('sectionlolos').style.display = 'none';
        document.getElementById('sectionditolak').style.display = 'none';
    } else if (document.getElementById('radio4').checked) {
        document.getElementById('sectionall').style.display = 'none';
        document.getElementById('sectiondiproses').style.display = 'none';
        document.getElementById('sectionterverifikasi').style.display = 'none';
        document.getElementById('sectionvalidasi').style.display = 'block';
        document.getElementById('sectionlolos').style.display = 'none';
        document.getElementById('sectionditolak').style.display = 'none';
    } else if (document.getElementById('radio5').checked) {
        document.getElementById('sectionall').style.display = 'none';
        document.getElementById('sectiondiproses').style.display = 'none';
        document.getElementById('sectionterverifikasi').style.display = 'none';
        document.getElementById('sectionvalidasi').style.display = 'none';
        document.getElementById('sectionlolos').style.display = 'block';
        document.getElementById('sectionditolak').style.display = 'none';
    } else if (document.getElementById('radio6').checked) {
        document.getElementById('sectionall').style.display = 'none';
        document.getElementById('sectiondiproses').style.display = 'none';
        document.getElementById('sectionterverifikasi').style.display = 'none';
        document.getElementById('sectionvalidasi').style.display = 'none';
        document.getElementById('sectionlolos').style.display = 'none';
        document.getElementById('sectionditolak').style.display = 'block';
    }
}