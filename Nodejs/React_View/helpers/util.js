import moment from 'moment';
export function formatDate(date){
	// let dateObj = new Date(date);
 //    let month = dateObj.getMonth()+1;
 //    let day = String(dateObj.getDate()).padStart(2, '0');
 //    let year = dateObj.getFullYear();
	return moment(date).format('MM/DD/YYYY');
}

export function getCurPer(min, max, value){
	let per = 0;
	if(min !== null && max!== null && value!==null && Number(min)!==Number(max)){
		per = (Number(value)-Number(min))/(Number(max)-Number(min));
	}
	return per;
}
export function formatFloat(number, fix){
	return (number === null) ? "N/A" : Number(number).toFixed(fix);
}

export function formatFloatPer(number, fix){
	return (number === null) ? "N/A" : Number(number).toFixed(fix)+"%";
}

export function subNumber(a, b, fix){
	return (a===null||b===null) ? "N/A" : (Number(a)-Number(b)).toFixed(fix); 
}

export function addNumber(a, b, fix, tail){
	return (a===null||b===null) ? "N/A" : (Number(a)+Number(b)).toFixed(fix)+tail; 
}