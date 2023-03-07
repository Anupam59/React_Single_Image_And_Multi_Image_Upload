import './App.css';
import axios from "axios";
import {useState} from "react";

function App() {

    const [PostName, setPostName] = useState('');
    const [PostImage, setPostImage] = useState('');

    const [MultImage, setMultImage] = useState([]);


    const handleMultChange = (e) => {
        setMultImage(e.target.files);
    };




    const addPost =(e)=>{

        e.preventDefault();
        const data = new FormData();
        data.append('post_name',PostName);
        data.append('post_image', PostImage);

        const res = axios.post("http://localhost:8000/api/PostAdd", data)
        console.log(res);
    };

    const addMultImage =(e)=>{
        e.preventDefault();
        console.log(MultImage);
        const data = new FormData();

        for (let i = 0; i < MultImage.length; i++) {
            data.append("mult_image[]", MultImage[i]);
        }

        const res = axios.post("http://localhost:8000/api/PostMoreImage", data,{
            headers: {
                "Content-Type": "multipart/form-data"
            }
        });
        console.log(res);
    };

  return (
    <div className="App">
        <hr/>
        <h1>Single Image Upload</h1>
      <form onSubmit={addPost}>
        <input type="text" name="post_name"
               onChange={e => setPostName(e.target.value)}
        />
        <input type="file" name="post_image"  onChange={e => setPostImage(e.target.files[0])}/>
        <p>---------------------------------------</p>
          <input type="submit" value="Add Post"/>
      </form>


        <hr/>
        <h1>Multi Image Upload</h1>


        <form onSubmit={addMultImage}>
            <input type="file" name="post_image[]" multiple  onChange={handleMultChange}/>
            <p>---------------------------------------</p>
            <input type="submit" value="Add Post"/>
        </form>

    </div>
  );
}

export default App;
