function delete_position(puth,text){
	//console.log(puth); проверка выводит ли параметры или нет
	//console.log(text);
	if(confirm(text)){
		location.href=puth;
	}
	return false;
}