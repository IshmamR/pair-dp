// console.log("hello");
const allImage = document.querySelectorAll('.to-show');
const modalOverlay = document.querySelector('.modal-overlay');
const modal = document.querySelector('.modal');
const modalImage = document.querySelector('.modal-img');
const imgSrc = document.querySelector('#img-src');
var source;
console.log(allImage + modalOverlay + modal);

// pop-up functions
allImage.forEach(img => {
	img.addEventListener('click', ()=> {
		var source = img.src;
		// console.log(source);
		modalOverlay.classList.add('active');
		modal.classList.add('active');
		modalImage.src = source;
		imgSrc.value = source;
	});
});

// close pop-up functions
modalOverlay.addEventListener('click', ()=> {
	modalOverlay.classList.remove('active');
	modal.classList.remove('active');
	// modalImage.src = "";
});