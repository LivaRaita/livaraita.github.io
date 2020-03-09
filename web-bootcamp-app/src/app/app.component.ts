import { Component, OnInit } from "@angular/core";

@Component({
  selector: "app-root",
  templateUrl: "./app.component.html",
  styleUrls: ["./app.component.css"]
})
export class AppComponent implements OnInit {
  title = "web-bootcamp-app";
  name = "Liva";
  show = false;
  btn_class_green = false;

  sports = [
    {
      id: 1,
      name: "hockey"
    },
    {
      id: 2,
      name: "tennis"
    },
    {
      id: 3,
      name: "basketball"
    }
  ];

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
}
