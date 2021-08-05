let galeryTime = ''
let lastGaleryTime = ''
let lastFetchTime = ''

window.onscroll = function() {
    const bodyHeight = document.body.scrollHeight
    const scrollPoint = window.scrollY + window.innerHeight

    galeryTime = document.getElementsByClassName('galery_time')
    lastGaleryTime = galeryTime[galeryTime.length - 1].value

    if(scrollPoint >= bodyHeight){
        // document.getElementById('feedContainer').insertAdjacentHTML('beforeend', '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>')
        if (lastFetchTime != lastGaleryTime) { 
            fetch('/loadmore/' + lastGaleryTime)
                .then(response => response.json())
                .then(data => {
                    lastFetchTime = lastGaleryTime
                    for (let i = 0; i < data.galerys.length; i++) {
                        let newGalery = renderGalery(data.galerys[i])
                        document.getElementById('galery-wrapper').insertAdjacentHTML('beforeend', newGalery)
                    }
                })
                .catch(err => console.log(err))
        }
    }
}

function renderGalery(data) {
    return `
        <div class="col-lg-4">
            <img src="${data.gambar}" class="img-fluid" alt="">
            <input type="hidden" class="galery_time" value="${data.created_at}">
        </div>
                    
    `
}