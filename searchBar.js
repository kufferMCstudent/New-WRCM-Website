let filterInput = document.getElementById('filterInput'); //Get input from user

filterInput.addEventListener('keyup', filterNames); // (event listener)mwhen user types, call function filterNames

function filterNames() //function to hide names that don't match
{
    let filterValue = document.getElementById('filterInput').value.toLowerCase(); //get the actual string that the user typed and convert to lower case for filtering

    let nameList = document.getElementsByClassName('schedule'); //get each day of the week
    for(let j = 0; j < nameList.length; j++) //for each day of the week
    {
        let nameItems = nameList[j].querySelectorAll('div.show'); //get array of the shows on a given day

        for(let i = 0; i < nameItems.length; i++)
        {
            let a = nameItems[i].getElementsByTagName('h3')[0]; //get the show name
            let b = nameItems[i].getElementsByClassName('person')[0]; //get the host name

            if(a.innerHTML.toLowerCase().indexOf(filterValue) > -1 || b.innerHTML.toLowerCase().indexOf(filterValue) > -1) //if what the user typed is in the show's or host's name
            {
                nameItems[i].style.display = ''; //make visible
            }
            else
            {
                nameItems[i].style.display = 'none'; //hide element
            }
        }
    }
}