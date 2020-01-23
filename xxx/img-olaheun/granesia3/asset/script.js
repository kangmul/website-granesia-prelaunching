/*
* Author : Ali Aboussebaba
* Email : bewebdeveloper@gmail.com
* Website : http://www.bewebdeveloper.com
* Subject : Using Ajax with PHP/MySQL
*/

// add_member function

function add_member() {
	// initialisation
	var url = 'app/gaji_karyawan/detail-act.php';
	var method = 'POST';
	var params = 'id_gaji='+document.getElementById('id_gaji').value;
	params += '&id_potongan='+document.getElementById('id_potongan').value;
	params += '&jumlah='+document.getElementById('jumlah').value;
	params += '&ket='+document.getElementById('ket').value;
	var container_id = 'list_container' ;
	var loading_text = '<img src="images/ajax_loader.gif">' ;
	// call ajax function
	ajax (url, method, params, container_id, loading_text) ;
}

function add_member2() {
	// initialisation
	var url = 'app/gaji_karyawan/detail-act2.php';
	var method = 'POST';
	var params = 'id_gaji='+document.getElementById('id_gaji').value;
	params += '&id_tunjangan='+document.getElementById('id_tunjangan').value;
	params += '&jumlah='+document.getElementById('jumlah').value;
	params += '&ket='+document.getElementById('ket').value;
	var container_id = 'list_container' ;
	var loading_text = '<img src="images/ajax_loader.gif">' ;
	// call ajax function
	ajax (url, method, params, container_id, loading_text) ;
}

function add_member3() {
	// initialisation
	var url = 'app/gaji_karyawan/detail-act3.php';
	var method = 'POST';
	var params = 'id_gaji='+document.getElementById('id_gaji').value;
	params += '&id_lembur='+document.getElementById('id_lembur').value;
	params += '&jam_lembur='+document.getElementById('jam_lembur').value;
	params += '&nilai_lembur='+document.getElementById('nilai_lembur').value;
	params += '&ket='+document.getElementById('ket').value;
	var container_id = 'list_container' ;
	var loading_text = '<img src="images/ajax_loader.gif">' ;
	// call ajax function
	ajax (url, method, params, container_id, loading_text) ;
}

function add_member4() {
	// initialisation
	var url = 'app/gaji_karyawan/detail-act4.php';
	var method = 'POST';
	var params = 'id_gaji='+document.getElementById('id_gaji').value;
	params += '&id_tumtut='+document.getElementById('id_tumtut').value;
	params += '&jam_hadir='+document.getElementById('jam_hadir').value;
	params += '&nilai_hadir='+document.getElementById('nilai_hadir').value;
	params += '&ket='+document.getElementById('ket').value;
	var container_id = 'list_container' ;
	var loading_text = '<img src="images/ajax_loader.gif">' ;
	// call ajax function
	ajax (url, method, params, container_id, loading_text) ;
}

// delete_member function
function delete_member(id) {
	if (confirm('Are you sure to delete this member ?')) {
		// initialisation
		var url = 'app/gaji_karyawan/detail-njo-hps.php';
		var method = 'POST';
		var params = 'id='+id;
		var container_id = 'list_container' ;
		var loading_text = '<img src="images/ajax_loader.gif">' ;
		// call ajax function
		ajax (url, method, params, container_id, loading_text) ;
	}
}

function delete_member2(id) {
	if (confirm('Are you sure to delete this member ?')) {
		// initialisation
		var url = 'app/gaji_karyawan/detail-njo-hps2.php';
		var method = 'POST';
		var params = 'id='+id;
		var container_id = 'list_container' ;
		var loading_text = '<img src="images/ajax_loader.gif">' ;
		// call ajax function
		ajax (url, method, params, container_id, loading_text) ;
	}
}

function delete_member3(id) {
	if (confirm('Are you sur to delete this member ?')) {
		// initialisation
		var url = 'app/gaji_karyawan/detail-njo-hps3.php';
		var method = 'POST';
		var params = 'id='+id;
		var container_id = 'list_container' ;
		var loading_text = '<img src="images/ajax_loader.gif">' ;
		// call ajax function
		ajax (url, method, params, container_id, loading_text) ;
	}
}
// ajax : basic function for using ajax easily
function ajax (url, method, params, container_id, loading_text) {
	//alert(loading_text);
    try { // For: chrome, firefox, safari, opera, yandex, ...
    	xhr = new XMLHttpRequest();
    } catch(e) {
	    try{ // for: IE6+
	    	xhr = new ActiveXObject("Microsoft.XMLHTTP");
	    } catch(e1) { // if not supported or disabled
		    alert("Not supported!");
		}
	}
	xhr.onreadystatechange = function() {
						       if(xhr.readyState == 4) { // when result is ready
							   
							       document.getElementById(container_id).innerHTML = xhr.responseText;
							   } else { // waiting for result 
						       document.getElementById(container_id).innerHTML = loading_text;
							   }
						   	}
	xhr.open(method, url, true);
	xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xhr.send(params);
}

