import { Injectable } from "@angular/core";
import { CanActivate } from "@angular/router";

@Injectable({
  providedIn: "root"
})
export class AccessControlService implements CanActivate {
  constructor() {}

  canActivate() {
    if (localStorage.canAccessList === "true") {
      return true;
    }
    return false;
  }
}
