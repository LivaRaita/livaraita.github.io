import { Component, OnInit } from "@angular/core";
import { HttpClient } from "@angular/common/http";
import { Users } from "src/models/users.models";

@Component({
  selector: "app-gallery",
  templateUrl: "./gallery.component.html",
  styleUrls: ["./gallery.component.css"]
})
export class GalleryComponent implements OnInit {
  constructor(private http: HttpClient) {}

  pictures: any[];
  hasUserData = false;
  getData() {
    if (!this.hasUserData) {
      this.http
        .get("https://reqres.in/api/users?page")
        .toPromise()
        .then(
          (response: any) => {
            this.users = response.data.map(row => new Users(row));
          },
          rejection => {}
        );
      this.hasUserData = true;
    }
  }

  ngOnInit(): void {}
}
