function quest1(){
	var q1=document.getElementsByName('type');
	if (q1[0].checked){
		document.getElementById('mistestvo').style.display = 'block';
		document.getElementById('lifestory').style.display = 'none';
	}
	else if (q1[1].checked){
		document.getElementById('lifestory').style.display = 'block';
		document.getElementById('mistestvo').style.display = 'none';
	}
}
window.onload = () => {
	let tags = document.querySelector('#tags');
	tags.oninput = function(){
		let value = this.value.trim();
		let list_search = document.querySelectorAll('.search_tags li');
		if (value != ''){
			list_search.forEach(elem =>{
				if (elem.innerText.search(value) == -1){
					elem.classList.add('hide');
					console.log(elem.classList);
				}
			});
		}
		else {
			list_search.forEach(elem => {
			elem.classList.remove('hide');
			console.log(elem.classList);
		});
		}

	};
};
function tag_add(){
	var legend = document.getElementById('1');
	var container = document.getElementById('themes');
	while (container.lastChild) {
    	container.removeChild(container.lastChild);
	}
	container.append(legend);
	var themes = document.getElementsByName('tag_result');
	let time_list = [];
	for(let i = 0; i < themes.length; i++){
		if (themes[i].checked){
			time_list.push(themes[i].value);
		}
	}
	var themes_list = time_list.join('; ');
	container.append(themes_list);
	container.classList.add('text2');
}
function send_form(){
	alert('Ваш приклад записано. Дякуємо за співпрацю!')
	window.location.reload()
}