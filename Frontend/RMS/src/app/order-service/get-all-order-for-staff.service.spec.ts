import { TestBed } from '@angular/core/testing';

import { GetAllOrderForStaffService } from './get-all-order-for-staff.service';

describe('GetAllOrderForStaffService', () => {
  let service: GetAllOrderForStaffService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(GetAllOrderForStaffService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
