import React, { Component } from 'react';

class FileUpload extends Component {

  constructor(props) {
    super(props);
      this.state = {
        uploadStatus: false
      }      
    this.handleUploadImage = this.handleUploadImage.bind(this);
  }
  

  handleUploadImage(ev) {
    ev.preventDefault();

    console.log("test");
    const data = new FormData();
    data.append('file', this.uploadInput.files[0]); //The .append() method inserts the specified content as the last child of each element in the jQuery collection
    data.append('filename', this.fileName.value);

    fetch("/upload", {method: "POST",body:data})
    .then(response => this.setState({ imageURL: `http://localhost:3000/${response.body.file}`, uploadStatus: true }))
    .catch(error => console.log(error));
    /* console.log(data.get("file"));

    axios.post('http://localhost:3000/upload', data)
      .then(function (response) {
        this.setState({ imageURL:  `http://localhost:3000/${response.body.file}`, uploadStatus: true });
      })
      .catch(function (error) {
        console.log(error);
      });*/
}

  render() {
    return(
      <div className="container">
        <form onSubmit={this.handleUploadImage}>
          <div className="form-group">
            <input className="form-control"  ref={(ref) => { this.uploadInput = ref; }} type="file" />
          </div>

          <div className="form-group">
            <input className="form-control" ref={(ref) => { this.fileName = ref; }} type="text" placeholder="Optional name for the file" />
          </div>

          <button className="btn btn-success">Upload</button>

        </form>
      </div>  
    )
  }
}

export default FileUpload;