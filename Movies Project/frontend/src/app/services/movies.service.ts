import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';


@Injectable({
  providedIn: 'root'
})
export class MoviesService {


  

  
  constructor(private httpClient:HttpClient) { }

  getMovies()
  {
   return this.httpClient.get("http://localhost:8888/movies-api/movies");
  }

  getMovie(id:any)
  {
    return this.httpClient.get(`http://localhost:8888/movies-api/movies/${id}`)
  }

  createReview(data:any)
  {
    let headers={"Content-Type":"application/json"};
    return this.httpClient.post("http://localhost:8888/movies-api/reviews",data,{headers});
  }


}