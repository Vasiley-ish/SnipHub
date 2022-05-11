const inpFile = document.getElementById('photo')
const imagePreview = document.querySelector('.image-preview')

inpFile.addEventListener("change", function(){
    const image = this.files[0]

    if(image){
        reader = new FileReader()
        reader.addEventListener("load", function(){
            imagePreview.setAttribute('src', this.result)
        })
        reader.readAsDataURL(image)

        imagePreview.style.display = 'block'

        return
    } 

    imagePreview.style.display = 'none'
    imagePreview.setAttribute('src', "")
    
})