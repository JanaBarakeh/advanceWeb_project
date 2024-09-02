import { TestBed } from '@angular/core/testing';

import { MenuPageCustomerService } from './menu-page-customer.service';

describe('MenuPageCustomerService', () => {
  let service: MenuPageCustomerService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(MenuPageCustomerService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
