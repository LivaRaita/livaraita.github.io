import { Component, OnInit, ViewChild } from "@angular/core";
import { Sport } from "../models/sports.model";
import { Users } from "../models/users.models";
import { HttpClient } from "@angular/common/http";

@Component({
  selector: "app-root",
  templateUrl: "./app.component.html",
  styleUrls: ["./app.component.css"]
})
export class AppComponent implements OnInit {
  @ViewChild("mainPopup") greatPopup;
  title = "web-bootcamp-app";
  name = "Liva";
  show = false;
  btn_class_green = false;

  sports: Sport[] = [
    {
      id: 1,
      name: "hockey",
      test: 1
    },
    {
      id: 2,
      name: "tennis"
    },
    {
      id: 3,
      name: "basketball"
    }
  ].map(row => new Sport(row));

  constructor(private http: HttpClient) {}

  ngOnInit() {
    setTimeout(() => {
      this.name = "Jon";
    }, 1000);

    setTimeout(() => {
      this.show = true;
    }, 5000);
  }
  toggleClass() {
    this.btn_class_green = !this.btn_class_green;
  }

  users: Users[];
  hasUserData = false;
  getData() {
    if (!this.hasUserData) {
      this.http
        .get("https://reqres.in/api/users?page")
        .toPromise()
        .then(
          (response: any) => {
            console.log(response.data);
            this.users = response.data.map(row => new Users(row));
            console.log(this.users);
          },
          rejection => {}
        );
      this.hasUserData = true;
    }
  }

  openPopup() {
    this.greatPopup.showPopup = true;
  }

  toggleListAccess() {
    localStorage.canAccessList =
      localStorage.canAccessList === "true" ? false : true;
  }
}
