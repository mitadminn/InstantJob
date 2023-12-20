 
<div class="row flex-row">
                <div class="col-lg-6 col-6 wrapper_state">
                    <label>State:</label>
                     <input type="text" class="form-control" id="state-input" value="<?=$state;?>" onkeyup="fetchStates()">
                    <div id="state-list" class="state-list-wrapper p-2 position-absolute rounded border bg-white" style="display:none;"></div>

                </div>
                <div class="col-lg-6 col-6 wrapper_city">
                    <label>City:</label>
                   <input type="text" class="form-control" id="city-input" <?=$city;?> onkeyup="fetchcity()">
                    <div id="city-list" class="state-list-wrapper p-2 position-absolute rounded border bg-white"  style="display:none;"></div>
                </div>
                
            </div>
 <script>
 
 // JavaScript code
function fetchStates() {
  const input = document.getElementById('state-input').value;
  const stateList = document.getElementById('state-list');
    
  const city = document.getElementById('city-input').value;
  const cityList = document.getElementById('city-list');
  
  if (input.length >= 3) {
    const xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        stateList.innerHTML = xhr.responseText;
        stateList.style.display = 'block';
      }
    };
    
    xhr.open('GET', 'ajaxData.php?input=' + input, true);
    xhr.send();
  } else {
    stateList.innerHTML = '';
    stateList.style.display = 'none';
  }
  
 
  
}


function selectState(state) {
  document.getElementById('state-input').value = state;
  document.getElementById('state-list').style.display = 'none';
}

function fetchcity() {
   
    
  const city = document.getElementById('city-input').value;
  const cityList = document.getElementById('city-list');
  
  
  
  if (city.length >= 3) {
    const xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        cityList.innerHTML = xhr.responseText;
        cityList.style.display = 'block';
      }
    };
    
    xhr.open('GET', 'ajaxData.php?city=' + city, true);
    xhr.send();
  } else {
    cityList.innerHTML = '';
    cityList.style.display = 'none';
  }
  
}


function selectCity(state) {
  document.getElementById('city-input').value = state;
  document.getElementById('city-list').style.display = 'none';
}

    </script>     