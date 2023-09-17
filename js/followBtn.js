const followBtn = document.querySelector("#followers__btn");

if(followBtn)
{
    followBtn.addEventListener('click',(e)=>{

        let params = new URL(document.location).searchParams;
        userID = params.get('userID');  
        const formData = new FormData();

        formData.append('userID',userID);

       let action ='';

        if(followBtn.classList.contains("follow__btn"))
        {
            action='follow';
            
        }
        else{
            action = 'unfollow';
            
        }
        formData.append('action',action);
        
        fetch('../controllers/followController.php',{
            method:'POST',
            body:formData,
          }).then(response=>response.json()).then(data=>{
                if(data[0].status=='success')
                {
                    followBtn.classList.remove("unfollow__btn");
                    followBtn.classList.remove("follow__btn");

                    if(action=='follow')
                    {
                        followBtn.classList.add('unfollow__btn');
                        followBtn.innerHTML = `<i class="fa-regular fa-heart"></i>Unfollow`;
                    }
                    else{
                        followBtn.classList.add('follow__btn');
                        followBtn.innerHTML = `<i class="fa-solid fa-heart"></i>Follow`;
                    }

                }
          });
    })
}