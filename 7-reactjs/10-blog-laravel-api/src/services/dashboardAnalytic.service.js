import { ApiServices } from "../utilities/Api.services";

const dashboardServiceUrl = {
  analytics: "/dashboard-analytic",
};

const getDashboardAnalytics = () => {
  const response = ApiServices.get(dashboardServiceUrl.analytics);
  return response;
};
export const DashboardAnalyticService = {
  getDashboardAnalytics,
};
