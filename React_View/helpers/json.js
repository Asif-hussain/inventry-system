 

export function extractJson(data){ 
	let result = {};
	if(data.recommendation){
	   let recommendation = data["recommendation"];
	   result["date"] = recommendation["date"];
	   //get A1c, egfr
	   for(let item in recommendation["labs"]){
	   		if(recommendation["labs"][item]["lab_type"]==="HbA1c"){
	   			result["HbA1c"] = recommendation["labs"][item];
	   		}
	   		else if(recommendation["labs"][item]["lab_type"]==="egfr"){
	   			result["egfr"] = recommendation["labs"][item];
	   		}
	   }
	   //get history
	   result["history"] = ArrtoString(recommendation["comorbidities"]);

	   //get age, gender
	   result["age"] = toStringAge(recommendation["demographics"]["age"]);
	   let gender = {"M":"Male","F":"Female","U":"Unknown"};
	   result["gender"] = (gender[recommendation["demographics"]["gender"]]) ? gender[recommendation["demographics"]["gender"]] : gender["U"]; 

	   //get cur treatment
	   result["current_treatment"]= {};
	   result["current_treatment"]["classes"] = ObjectArrtoString(recommendation["current_treatment"]["drug_classes"],"name");
	   result["current_treatment"]["class_objs"] = recommendation["current_treatment"]["drug_classes"];
	   result["current_treatment"]["effect"] = recommendation["current_treatment"]["effect"];

	   //get recommend treatments
	   result["recommended_treatments"]= [];
	   for(let i in recommendation["recommended_treatments"]){
	   	  if(recommendation["recommended_treatments"][i]){
	   	  	let obj = {};
		   	obj["classes"] = ObjectArrtoString(recommendation["recommended_treatments"][i]["drug_classes"],"name");
		   	obj["class_objs"] = recommendation["recommended_treatments"][i]["drug_classes"];
		   	obj["effect"] = recommendation["recommended_treatments"][i]["effect"];
		   	obj["warnings"] = [];
		   	for(let key in recommendation["recommended_treatments"][i]["warnings"]){
		   		obj["warnings"].push({"key":key,"name":toUpper(key),"msg":recommendation["recommended_treatments"][i]["warnings"][key]});
		   	}
		   	result["recommended_treatments"].push(obj);
	   	  }  
	   }
	} 
    
    return result;
}
 
function ArrtoString(arr){
	let res = "";
	for(let i in arr){
		if(i===arr.length-1){
			res += toUpper(arr[i])
		}
		else{
			res += toUpper(arr[i]) + ", "
		}
	}
	return res
} 

function ObjectArrtoString(arr, item){
	let res = "";
	for(let i in arr){
		if(i===arr.length-1){
			res += arr[i][item]
		}
		else{
			res += arr[i][item] + ", "
		}
	}
	return res
}

function toStringAge(num){

	return num.toString().split(".")[0];

}

function toUpper(str) {
	let ignore_words = ["wo","w"];
	return str 
	    .split('_')
	    .map(function(word) {  
	        return (ignore_words.includes(word) || word.length < 2) ? word : (word[0].toUpperCase() + word.substr(1));
	    })
	    .join(' ');
}