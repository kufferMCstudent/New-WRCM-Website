const images = document.querySelectorAll("[data-src]"); //get all images that have data-src (won't be loaded) instead of scr (will be loaded) sources

            function preloadImage(img)
            {
                const src = img.getAttribute("data-src"); //get he path for the image
                if(!src) //if there is nothing in data-src
                {
                    return;
                }
                
                img.src = src; //set the src equal to data-src so is becomes visible
            }

            const imgOptions = {
                threshhold: 0,
                rootMargin: "0px 0px 300px 0px" //when image is 300px below the screen
            };
            const imgObserver = new IntersectionObserver((entries, imgObserver) => {
                entries.forEach(entry =>
                {
                    if (!entry.isIntersecting)
                    {
                        return;
                    }
                    else //if there is an image 300px or less below screen
                    {
                        preloadImage(entry.target); //load the image
                        imgObserver.unobserve(entry.target); //remove from the observer so that the observer no longer have to check a loaded object
                    }
                });

            }, imgOptions);

            //observe all images with data-src in the page 
            images.forEach(image => {
                imgObserver.observe(image);
            });