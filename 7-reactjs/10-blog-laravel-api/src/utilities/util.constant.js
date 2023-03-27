export const APP_TOKEN_NAME = "TOKEN";

export const unAuthenticatedRoutes = {
  LOGIN: "/",
  REGISTER: "/register",
};
export const authenticatedRoutes = {
  DASHBOARD: "/",
  CATEGORIES: "/categories",
  ADD_CATEGORY: "/category/add",
  EDIT_CATEGORY: "/category/edit/:id",
  POSTS: "/posts",
  ADD_POST: "/post/add",
  EDIT_POST: "/posts/edit/:id",
};

export const FooterText = "AHSAN copyright 2023";

export const globalReactQueryOptions = {
  refetchOnMount: "always",
};
