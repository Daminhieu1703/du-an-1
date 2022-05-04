// ACTIVE MENU BTN 
const currentLocation = location.href
const menuItem = document.querySelectorAll('.nav__link')
for (let i = 0; i < menuItem.length; i++) {
  if (menuItem[i].href === currentLocation) {
    menuItem[i].classList.add('active')
  }

}
/*====================CHANGE BACKGROUND================*/
function scrollHeader() {
  const header = document.getElementById("header");
  // When the scroll is greater than 100 viewport height, add the scroll-header class to the header tag
  if (this.scrollY >= 100) header.classList.add("scroll-header");
  else header.classList.remove("scroll-header");
}
window.addEventListener("scroll", scrollHeader);
// FORM DISCOUNT
const openFormDiscount = document.querySelector(".form-discount-toggle");
const formApply = document.querySelector(".form-apply__discount");

try {
  openFormDiscount.addEventListener("click", () => {
    formApply.classList.toggle("active");
  });
}catch (e) {
  console.log("not discount active");
}

// TAB function
function openCity(evt, containerName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(containerName).style.display = "block";
  evt.currentTarget.className += " active";
}

try {
  document.getElementById("defaultOpen").click();
}catch {
  console.log("payment page");
}

// MENU BTN

const menuToggle = document.querySelector("#menu-hidden-btn");
const menu = document.querySelector(".nav__menu");

try {
  menuToggle.addEventListener("click", () => {
    menu.classList.toggle("nav__menu-block");
  });
} catch {}

//
const btnFilter = document.querySelector("#btn_filter");
const sideBarFilter = document.querySelector(".shop-sidebar-menu");

try {
  document.addEventListener("click", (e) => {
    let target = e.target;
    do {
      if (target == btnFilter) {
        sideBarFilter.classList.toggle("active");
        return;
      }
      target = target.parentNode;
    } while (target);
    sideBarFilter.classList.remove("active");
  });
} catch {}

// INPUT IMG

let inputs = document.querySelectorAll( '.inputfile' );
Array.prototype.forEach.call( inputs, function( input )
{
	var label	 = input.nextElementSibling,
		labelVal = label.innerHTML;

	input.addEventListener( 'change', function( e )
	{
		var fileName = '';
		if( this.files && this.files.length > 1 )
			fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
		else
			fileName = e.target.value.split( '\\' ).pop();

		if( fileName )
			label.querySelector( 'span' ).innerHTML = fileName;
		else
			label.innerHTML = labelVal;
	});
});



