(function sortTheArtists() {

let sortButton = document.getElementById('sort');
let showOrHide = document.getElementById('hidden-sort-options').className;
let plusOrMinus = document.getElementsByClassName('fa-plus-circle')[0].className;

console.log(plusOrMinus);

sortButton.addEventListener('click', function() {
	console.log('clicked');
	if(showOrHide === 'hide') {
		document.getElementById('hidden-sort-options').className = 'show';
		showOrHide = 'show';
		document.getElementsByClassName('fa-plus-circle')[0].className = 'fas fa-plus-circle hide';
		document.getElementsByClassName('fa-minus-circle')[0].className = 'fas fa-minus-circle show';
	} else {
		document.getElementById('hidden-sort-options').className = 'hide';
		showOrHide = 'hide';
		document.getElementsByClassName('fa-plus-circle')[0].className = 'fas fa-plus-circle show';
		document.getElementsByClassName('fa-minus-circle')[0].className = 'fas fa-minus-circle hide';
	}
})

})()




