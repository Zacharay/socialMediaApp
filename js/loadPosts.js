const postObserver = new IntersectionObserver(entries=>{
    entries.forEach(entry =>{
        if(entry.isIntersecting)
        {
            entry.target.classList.add("post__container__show");
            postObserver.unobserve(entry.target);
        }
        
        
    })
},{
    threshold:0.2
})

const posts = document.querySelectorAll(".post__container");

posts.forEach(post=>{
    postObserver.observe(post);
})