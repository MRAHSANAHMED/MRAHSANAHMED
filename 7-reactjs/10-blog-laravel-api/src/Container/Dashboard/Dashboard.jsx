import React from "react";
import {
  Chart as ChartJS,
  CategoryScale,
  LinearScale,
  BarElement,
  Title,
  Tooltip,
  Legend,
} from "chart.js";
import { Bar } from "react-chartjs-2";
import { chartOptions, customChartLabels } from "./dashboard.constant";
import { useQuery } from "react-query";
import { DashboardAnalyticService } from "../../services/dashboardAnalytic.service";

import CustomLoader from "../CustomLoader/CustomLoader";

ChartJS.register(
  CategoryScale,
  LinearScale,
  BarElement,
  Title,
  Tooltip,
  Legend
);

export const options = chartOptions;

const labels = customChartLabels;

function Dashboard() {
  const { data: dashboardData, isLoading: dashboardDataLoading } = useQuery(
    "dashboard",
    DashboardAnalyticService.getDashboardAnalytics
  );

  const resultData = dashboardData?.data?.results;

  const data = {
    labels,
    datasets: [
      {
        label: "Entries Count",
        data: [
          resultData?.post_count,
          resultData?.comment_count,
          resultData?.user_count,
          resultData?.category_count,
        ],
        backgroundColor: "rgba(255, 99, 132, 0.5)",
      },
    ],
  };

  if (dashboardDataLoading) {
    return <CustomLoader />;
  }

  return (
    <div>
      <h2>Dashboard</h2>

      <Bar options={options} data={data} />
    </div>
  );
}

export default Dashboard;
